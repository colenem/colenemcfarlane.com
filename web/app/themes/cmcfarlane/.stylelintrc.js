module.exports = {
  'extends': [ 'stylelint-config-standard',
    'stylelint-config-prettier',
    'stylelint-prettier/recommended' 
  ],
  'rules': {
    'indentation': 4,
    'no-empty-source': null,
    'string-quotes': 'single',
    'at-rule-no-unknown': [
      true,
      {
        'ignoreAtRules': [
          'extend',
          'at-root',
          'debug',
          'warn',
          'error',
          'if',
          'else',
          'for',
          'each',
          'while',
          'mixin',
          'include',
          'content',
          'return',
          'function',
          'tailwind',
          'apply',
          'responsive',
          'variants',
          'screen',
        ],
      },
    ],
    "comment-empty-line-before": [
      "always", {
        "except": ["first-nested"],
        "ignore": ["after-comment", "stylelint-commands"],
        "ignoreComments": ["/\\s*ignore/"]
      }
    ],
    "function-name-case": [
      "lower", {
        "ignoreFunctions": ["/(.*rem|.*pixels)/i"]
      }
    ]
  },
};
