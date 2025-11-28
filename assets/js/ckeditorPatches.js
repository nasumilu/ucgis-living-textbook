/**
 * Run these patches when CKEDITOR is detected
 */
$(function () {
  if (!window.CKEDITOR) {
    return;
  }

  // Disable version check
  CKEDITOR.config.versionCheck = false;

  // Update h1 & h2 styles to use h3 & h4 tags
  CKEDITOR.config.format_h1 = {element: 'h3'};
  CKEDITOR.config.format_h2 = {element: 'h4'};

  // // Add extra styles
  CKEDITOR.config.format_citation = {name: 'Citation', element: 'div', attributes: {'class': 'citation'}};
  CKEDITOR.config.format_reference = {name: 'Reference', element: 'div', attributes: {'class': 'reference'}};


  const greekSmallLetter = [
    ['&alpha;', 'Small letter alpha'],
    ['&beta;', 'Small letter beta'],
    ['&gamma;', 'Small letter gamma'],
    ['&delta;', 'Small letter delta'],
    ['&epsilon;', 'Small letter epsilon'],
    ['&zeta;', 'Small letter zeta'],
    ['&eta;', 'Small letter eta'],
    ['&theta;', 'Small letter theta'],
    ['&iota;', 'Small letter iota'],
    ['&kappa;', 'Small letter kappa'],
    ['&lambda;', 'Small letter lambda'],
    ['&mu;', 'Small letter mu'],
    ['&nu;', 'Small letter nu'],
    ['&xi;', 'Small letter xi'],
    ['&pi;', 'Small letter pi'],
    ['&rho;', 'Small letter rho'],
    ['&sigmaf;', 'Small letter final sigma'],
    ['&sigma;', 'Small letter sigma'],
    ['&tau;', 'Small letter tau'],
    ['&upsilon;', 'Small letter upsilon'],
    ['&phi;', 'Small letter phi'],
    ['&chi;', 'Small letter chi'],
    ['&psi;', 'Small letter psi'],
    ['&omega;', 'Small letter omega'],
    ['&thetasym;', 'Small letter theta symbol'],
    ['&piv;', 'Small letter pi symbol']
  ];
  const greekCapitalLetter = [
    ['&Alpha;', 'Capital letter alpha'],
    ['&Beta;', 'Capital letter beta'],
    ['&Gamma;', 'Capital letter gamma'],
    ['&Delta;', 'Capital letter delta'],
    ['&Epsilon;', 'Capital letter epsilon'],
    ['&Zeta;', 'Capital letter zeta'],
    ['&Eta;', 'Capital letter eta'],
    ['&Theta;', 'Capital letter theta'],
    ['&Iota;', 'Capital letter iota'],
    ['&Kappa;', 'Capital letter kappa'],
    ['&Lambda;', 'Capital letter lambda'],
    ['&Mu;', 'Capital letter mu'],
    ['&Nu;', 'Capital letter nu'],
    ['&Xi;', 'Capital letter xi'],
    ['&Pi;', 'Capital letter pi'],
    ['&Rho;', 'Capital letter rho'],
    ['&Sigma;', 'Capital letter sigma'],
    ['&Tau;', 'Capital letter tau'],
    ['&Upsilon;', 'Capital letter upsilon'],
    ['&Phi;', 'Capital letter phi'],
    ['&Chi;', 'Capital letter chi'],
    ['&Psi;', 'Capital letter psi'],
    ['&Omega;', 'Capital letter omega']
  ]
  const latinSmallLetter = [
    ['&szlig;', 'Small letter sharp s (ess-z)'],
    ['&agrave;', 'Small letter a with grave accent'],
    ['&aacute;', 'Small letter a with acute accent'],
    ['&acirc;', 'Small letter a with circumflex accent'],
    ['&atilde;', 'Small letter a with tilde'],
    ['&auml;', 'Small letter a with diaeresis'],
    ['&aring;', 'Small letter a with ring above'],
    ['&aelig;', 'Small letter ae'],
    ['&ccedil;', 'Small letter c with cedilla'],
    ['&egrave;', 'Small letter e with grave accent'],
    ['&eacute;', 'Small letter e with acute accent'],
    ['&ecirc;', 'Small letter e with circumflex accent'],
    ['&euml;', 'Small letter e with diaeresis'],
    ['&igrave;', 'Small letter i with grave accent'],
    ['&iacute;', 'Small letter i with acute accent'],
    ['&icirc;', 'Small letter i with circumflex accent'],
    ['&iuml;', 'Small letter i with diaeresis'],
    ['&eth;', 'Small letter eth'],
    ['&ntilde;', 'Small letter n with tilde'],
    ['&ograve;', 'Small letter o with grave accent'],
    ['&oacute;', 'Small letter o with acute accent'],
    ['&ocirc;', 'Small letter o with circumflex accent'],
    ['&otilde;', 'Small letter o with tilde'],
    ['&ouml;', 'Small letter o with diaeresis'],
    ['&oslash;', 'Small letter o with stroke'],
    ['&ugrave;', 'Small letter u with grave accent'],
    ['&uacute;', 'Small letter u with acute accent'],
    ['&ucirc;', 'Small letter u with circumflex accent'],
    ['&uuml;', 'Small letter u with diaeresis'],
    ['&yacute;', 'Small letter y with acute accent'],
    ['&thorn;', 'Small letter thorn'],
    ['&yuml;', 'Small letter y with diaeresis']
  ];
  const latinCapitalLetter = [
    ['&Agrave;', 'Capital letter a with grave accent'],
    ['&Aacute;', 'Capital letter a with acute accent'],
    ['&Acirc;', 'Capital letter a with circumflex accent'],
    ['&Atilde;', 'Capital letter a with tilde'],
    ['&Auml;', 'Capital letter a with diaeresis'],
    ['&Aring;', 'Capital letter a with ring above'],
    ['&AElig;', 'Capital letter ae'],
    ['&Ccedil;', 'Capital letter c with cedilla'],
    ['&Egrave;', 'Capital letter e with grave accent'],
    ['&Eacute;', 'Capital letter e with acute accent'],
    ['&Ecirc;', 'Capital letter e with circumflex accent'],
    ['&Euml;', 'Capital letter e with diaeresis'],
    ['&Igrave;', 'Capital letter i with grave accent'],
    ['&Iacute;', 'Capital letter i with acute accent'],
    ['&Icirc;', 'Capital letter i with circumflex accent'],
    ['&Iuml;', 'Capital letter i with diaeresis'],
    ['&ETH;', 'Capital letter eth'],
    ['&Ntilde;', 'Capital letter n with tilde'],
    ['&Ograve;', 'Capital letter o with grave accent'],
    ['&Oacute;', 'Capital letter o with acute accent'],
    ['&Ocirc;', 'Capital letter o with circumflex accent'],
    ['&Otilde;', 'Capital letter o with tilde'],
    ['&Ouml;', 'Capital letter o with diaeresis'],
    ["&Oslash;", 'Capital letter o stroke'],
    ['&Ugrave;', 'Capital letter u with grave accent'],
    ['&Uacute;', 'Capital letter u with acute accent'],
    ['&Ucirc;', 'Capital letter u with circumflex accent'],
    ['&Uuml;', 'Capital letter u with diaeresis'],
    ['&Yacute;', 'Capital letter y with acute accent'],
    ['&THORN;', 'Capital letter thorn'],
  ];

  const otherLatinSymbols = [
    ['&forall;', 'For all'],
    ['&part;', 'Partial differential'],
    ['&exist;', 'There exists'],
    ['&empty;', 'Empty set'],
    ['&nabla;', 'Nabla'],
    ['&isin;', 'Element of'],
    ['&notin;', 'Not an element of'],
    ['&ni;', 'Contains as member'],
    ['&prod;', 'N-ary product'],
    ['&sum;', 'N-ary summation'],
    ['&radic;', 'Square root'],
    ['&prop;', 'Proportional to'],
    ['&infin;', 'Infinite'],
    ['&ang;', 'Angle'],
    ['&and;', 'Logical and'],
    ['&or;', 'Logical or'],
    ['&cap;', 'Intersection'],
    ['&cup;', 'Union'],
    ['&int;', 'Integral'],
    ['&there4;', 'Therefore'],
    ['&sim;', 'Tilde operator'],
    ['&cong;', 'Congruent to'],
    ['&asymp;', 'Almost equal to'],
    ['&ne;', 'Not equal to'],
    ['&equiv;', 'Identical to'],
    ['&le;', 'Less-than or equal to'],
    ['&ge;', 'Greater-than or equal to'],
    ['&sub;', 'Subset of'],
    ['&sup;', 'Superset of'],
    ['&nsub;', 'Not a subset of'],
    ['&sube;', 'Subset of or equal to'],
    ['&supe;', 'Superset of or equal to'],
    ['&oplus;', 'Circle plus'],
    ['&otimes;', 'Circle times'],
    ['&perp;', 'Perpendicular']
  ];

  CKEDITOR.config.specialChars = [...greekSmallLetter, ...greekCapitalLetter, ...latinSmallLetter, ...latinCapitalLetter, ...otherLatinSymbols];

  if (ckeditorCss) {
    CKEDITOR.config.contentsCss = ckeditorCss;
  }

  // Set caption checkbox by default in image dialog
  CKEDITOR.on('dialogDefinition', (evt) => {
    // Only parse image properties
    if (evt.data.name !== 'image2') return;

    let definition = evt.data.definition;
    let info = definition.getContents('info');

    let captionBox = info.get('hasCaption');
    let origSetup = captionBox['setup'];

    // This needs to be a function in order to scope this correctly!
    captionBox['setup'] = function (widget) {
      // Set hasCaption to true if there is no src
      if (widget.data.src === '') {
        widget.data.hasCaption = true;
      }
      origSetup.bind(this)(widget);
    };
  });

  // Fix table dialog definition
  CKEDITOR.on('dialogDefinition', (evt) => {
    // Only parse table properties
    if (evt.data.name !== 'table' && evt.data.name !== 'tableProperties') return;

    let definition = evt.data.definition;
    let info = definition.getContents('info');

    // Move txtCols to other column
    let txtCols = info.get('txtCols');
    info.remove('txtCols');
    info.add(txtCols, 'txtWidth');

    // Remove unwanted fields
    info.remove('txtCellSpace');
    info.remove('txtCellPad');
    info.remove('txtHeight');
    info.remove('txtWidth');
    info.remove('txtBorder');
    info.remove('cmbAlign');
    info.remove('txtSummary');

    // Fix dialog size
    definition.minHeight = 185;
  });

});
