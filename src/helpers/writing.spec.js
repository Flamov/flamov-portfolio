jest.mock('fs');
jest.mock('glob');

const fs = require('fs');
const glob = require('glob');

const { getJournalArticleData, getJournalArticlesList } = require('./writing');

afterEach(() => {
  jest.clearAllMocks();
});

describe('getJournalArticleData', () => {
  it('gets writing article data', () => {
    fs.readFileSync.mockImplementation(() => '---\nfoo: bar\nhello: world\n---\n# Lorem ipsum\nDolor sit amet');

    const results = getJournalArticleData('test-writing-article-file.md');

    expect(fs.readFileSync).toHaveBeenCalledTimes(1);
    expect(fs.readFileSync).toHaveBeenCalledWith('test-writing-article-file.md', 'utf-8');

    expect(results).toStrictEqual({
      slug: 'test-writing-article-file',
      attributes: {
        foo: 'bar',
        hello: 'world',
      },
      content: '<h1 id="lorem-ipsum">Lorem ipsum</h1>\n<p>Dolor sit amet</p>',
    });
  });
});

describe('getJournalArticlesList', () => {
  beforeEach(() => {
    glob.sync.mockImplementation(() => [
      'test-writing-article-file-1.md',
      'test-writing-article-file-2.md',
      'test-writing-article-file-3.md',
      'test-writing-article-file-4.md',
    ]);

    fs.readFileSync.mockImplementation(() => '---\nfoo: bar\n---\nHello world');
  });

  it('gets writing articles list with no limit', async () => {
    const results = await getJournalArticlesList();

    expect(glob.sync).toHaveBeenCalledTimes(1);
    expect(glob.sync).toHaveBeenCalledWith('./src/data/writing/**.md');

    expect(fs.readFileSync).toHaveBeenCalledTimes(4);
    expect(fs.readFileSync).toHaveBeenNthCalledWith(1, 'test-writing-article-file-1.md', 'utf-8');
    expect(fs.readFileSync).toHaveBeenNthCalledWith(2, 'test-writing-article-file-2.md', 'utf-8');
    expect(fs.readFileSync).toHaveBeenNthCalledWith(3, 'test-writing-article-file-3.md', 'utf-8');
    expect(fs.readFileSync).toHaveBeenNthCalledWith(4, 'test-writing-article-file-4.md', 'utf-8');

    expect(results).toStrictEqual([
      { slug: 'test-writing-article-file-1', attributes: { foo: 'bar' }, content: '<p>Hello world</p>' },
      { slug: 'test-writing-article-file-2', attributes: { foo: 'bar' }, content: '<p>Hello world</p>' },
      { slug: 'test-writing-article-file-3', attributes: { foo: 'bar' }, content: '<p>Hello world</p>' },
      { slug: 'test-writing-article-file-4', attributes: { foo: 'bar' }, content: '<p>Hello world</p>' },
    ]);
  });

  it('gets writing articles list with limit', async () => {
    const results = await getJournalArticlesList(2);

    expect(results).toStrictEqual([
      { slug: 'test-writing-article-file-1', attributes: { foo: 'bar' }, content: '<p>Hello world</p>' },
      { slug: 'test-writing-article-file-2', attributes: { foo: 'bar' }, content: '<p>Hello world</p>' },
    ]);
  });
});