import Util from '../util';

export default function fetch_term() {
  var select = document.querySelector('.js-select');
  var url = window.location.href.split('?')[0];

  url.includes('page') ? (url = url.substring(0, url.indexOf('page'))) : null;

  if (select != undefined) {
    initFetch();
  }

  function initFetch() {
    select.addEventListener('change', function() {
      location.href = url + '?category=' + this.value;
    });
  }
}
