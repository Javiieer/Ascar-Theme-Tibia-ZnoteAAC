/* Character Name Search */
const charNameSuggestions = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  remote: {
    url: "/ajax/suggest_names.php?name=%QUERY",
    wildcard: "%QUERY"
  }
});

$(".char-search").typeahead(
  {
    minLength: 3
  },
  {
    name: "char-names",
    source: charNameSuggestions
  }
);

/* Item Name Search */
const itemNameSuggestions = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.whitespace,
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: "/cache/public/item_names.json"
});

$('.item-search').typeahead(null, {
  name: 'item-names',
  source: itemNameSuggestions
});
