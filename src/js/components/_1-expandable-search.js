import Util from "../util";

export default function expandable_search() {
  var expandableSearch = document.getElementsByClassName(
    "js-expandable-search"
  );
  if (expandableSearch.length > 0) {
    for (var i = 0; i < expandableSearch.length; i++) {
      (function(i) {
        // if user types in search input, keep the input expanded when focus is lost
        expandableSearch[i]
          .getElementsByClassName("form-control")[0]
          .addEventListener("input", function(event) {
            Util.toggleClass(
              event.target,
              "form-control--has-content",
              event.target.value.length > 0
            );
          });
      })(i);
    }
  }
}
