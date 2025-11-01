<?php

namespace App\ConceptPrint;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use function sys_get_temp_dir;
use function tempnam;
use function str_starts_with;
use function fwrite;
use function fopen;
use function fclose;
use function parse_url;


readonly class ImageResolver
{

  private string $tmpDir;
  private HttpClientInterface $client;

  public function __construct(
    private string $prefix = "ltb_",
    ?string $tmpDir = null)
  {
    $tmpDir ??= sys_get_temp_dir();
    if (!is_dir($tmpDir) || !is_writable($tmpDir)) {
      throw new \RuntimeException('Temporary directory is not writable: ' . $tmpDir);
    }
    $this->tmpDir = $tmpDir;
    $this->client = HttpClient::create(['headers' => ['User-Agent' => 'UCGIS Concept Print', 'Accept' => 'image/*']]);
  }

  public function download(string $url): string
  {

    $parts = parse_url($url);
    $path = $parts['path'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $filename = tempnam($this->tmpDir, $this->prefix) . '.' . $extension;
    try {
      $response = $this->client->request('GET', $url);

      if (200 != $response->getStatusCode()) {
        throw new \RuntimeException('Could not download file from S3: ' . $response->getStatusCode());
      }

      $contentType = $response->getHeaders(false)['content-type'][0] ?? null;
      if ($contentType !== null && !str_starts_with($contentType, 'image/')) {
        throw new \RuntimeException('Expected an image file, but got a ' . $contentType);
      }

      $file = @fopen($filename, 'wb');
      if ($file === false) {
        throw new \RuntimeException('Could not open file for writing: ' . $filename);
      }

      foreach ($this->client->stream($response) as $chunk) {
        fwrite($file, $chunk->getContent());
      }
    } catch(TransportExceptionInterface $ex) {
      // do something with the exception

    } finally {
      fclose($file);
    }
    return $filename;
  }

}
