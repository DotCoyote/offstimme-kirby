module.exports = {
  'printWidth': 120,
  'tabWidth': 2,
  'useTabs': false,
  'semi': true,
  'singleQuote': true,
  'quoteProps': 'as-needed',
  'trailingComma': 'all',
  'bracketSpacing': true,
  'arrowParens': 'always',
  'proseWrap': 'preserve',
  'endOfLine': 'lf',
  'xmlSelfClosingSpace': false,
  'overrides': [
    {
      'files': '*.xml',
      'options': {
        'printWidth': 140,
      },
      'excludeFiles': [ '*.schema.xml', '*.transfer.xml' ],
    },
    {
      'files': '*.php',
      'options': {
        'tabWidth': 4,
      },
    },
    {
      'files': [ '*.schema.xml', '*.transfer.xml' ],
      'options': {
        'printWidth': 300,
      },
    },
  ],
};
