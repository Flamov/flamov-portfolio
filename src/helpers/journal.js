const fs = require('fs');
const path = require('path');
const marked = require('marked');
const frontmatter = require('front-matter');
const highlightjs = require('highlight.js');

const { JOURNAL_DATA_DIRECTORY } = require('./constants');

marked.setOptions({
  highlight: (code, language) => highlightjs.highlight(
    highlightjs.getLanguage(language) ? language : 'plaintext',
    code,
  ).value,
});

/**
 * Returns object of articles with file, body, attributes, title, description, and slug
 * @param {String} file File path to parse
 */
const getJournalArticleData = (file) => {
  // Infer slug from the file name without extension
  const slug = path.basename(file, path.extname(file));

  const data = fs.readFileSync(file, 'utf-8');

  // Get body and front-matter attributes
  const { body, attributes } = frontmatter(data);

  const lexer = marked.lexer(body);

  // Infer the title from the first top-level header
  const title = lexer.find((item) => item.type === 'heading' && item.depth === 1);

  // Infer description from the first paragraph
  const description = lexer.find((item) => item.type === 'paragraph');

  return {
    slug,
    attributes,
    title: title.text,
    description: description.tokens.map((token) => token.text).join(''),
    content: marked(body),
  };
};

/**
 * Returns object of articles with slug, title, description
 * @param {number=} limit Number of articles to return or returns all articles if omitted
 */
const getJournalArticlesList = (limit) => {
  const results = fs.readdirSync(JOURNAL_DATA_DIRECTORY)
    .map((file) => getJournalArticleData(`${JOURNAL_DATA_DIRECTORY}/${file}`))
    .sort((a, b) => Date.parse(b.attributes.published) - Date.parse(a.attributes.published));

  if (limit) {
    return results.slice(0, limit);
  }

  return results;
};

module.exports = { getJournalArticleData, getJournalArticlesList };