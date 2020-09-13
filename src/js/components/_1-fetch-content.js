import Util from '../util';

export default function fetch_content_btn() {
  var fetchContainer = document.querySelector('.js-fetch-container');
  var load_more_btn = document.querySelector('.js-load-more');
  var fetch_term_btn = document.querySelectorAll('.js-fetch-content-btn');
  var httpRequest;
  var page;
  var type;
  var term;
  var program;
  var posts_per_page = 12;
  var postCount;
  var pageCount;
  var url;

  if (fetchContainer != undefined) {
    type = fetchContainer.dataset.type;
    postCount = fetchContainer.dataset.count;
    if (postCount > posts_per_page) {
      pageCount = Math.ceil(postCount / posts_per_page);
      load_more_btn.style.display = 'block';
    } else {
      pageCount = 1;
    }
    console.log(pageCount);
    page = 2;
    load_more_btn.addEventListener('click', function(event) {
      console.log('page: ' + page);
      console.log('pageCount: ' + pageCount);
      event.preventDefault();
      if (page >= pageCount - 1) {
        load_more_btn.style.display = 'none';
      }
      buildURL();
    });
  }

  //if (fetch_term_btn.length > 0) {
  // for (var i = 0; i < fetch_term_btn.length; i++) {
  //  console.log('yes');
  //  (function(i) {
  //    initFetchContent(fetch_term_btn[i]);
  //    })(i);
  //  }
  //  }

  function initFetchContent(btn) {
    btn.addEventListener('click', function(event) {
      event.preventDefault();
      page = 1;
      type = this.dataset.type;
      term = this.dataset.slug;
      program = this.dataset.program;
      pageCount = 1;

      buildURL();
    });
  }

  function buildURL() {
    console.log('buildURL has run');
    console.log(term);
    url =
      'http://localhost:3000/wp-json/wp/v2/' +
      type +
      '?_embed&per_page=' +
      posts_per_page;
    if (program != undefined) {
      url += '&program=' + program;
    }
    if (term != undefined) {
      url += '&categories=' + term;
    }
    url += '&page=' + page;

    console.log('in buildURL ' + url);
    makeRequest(url);
  }

  function makeRequest(query) {
    httpRequest = new XMLHttpRequest();

    if (!httpRequest) {
      return false;
    }
    httpRequest.onreadystatechange = handleResponse;
    httpRequest.open('GET', query);
    httpRequest.send();
  }

  function handleResponse() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        var posts = JSON.parse(httpRequest.response);

        buildCards(posts);
      }
    }
  }

  function buildCards(items) {
    page = page + 1;
    console.log(items);
    var list = '';
    items.forEach(function(item) {
      console.log(item.title.rendered);
      list += '<li class="col-4@md">' + item.title.rendered + '</li>';
    });
    fetchContainer.innerHTML += list;
  }
}

//If fetch container exists
