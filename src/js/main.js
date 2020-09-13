/* global IS_DEV */
import devtools from './devtools';
import Util from './util';
import accordion from './components/_1-accordion';
import anim_menu_btn from './components/_1-anim-menu-btn';
import diagonal_movement from './components/_1-diagonal-movement';
import expandable_search from './components/_1-expandable-search';
import fetch_term from './components/_1-fetch-term';
import looping_tabs from './components/_1-looping-tabs';
import modal_window from './components/_1-modal-window';
import smooth_scrolling from './components/_1-smooth-scrolling';
import swipe_content from './components/_1-swipe-content';
import tooltip from './components/_1-tooltip';
import modal_video from './components/_2-modal-video';
import slideshow from './components/_2-slideshow';
import svg_slideshow from './components/_2-svg-slideshow';
import main_header_v2 from './components/_3-main-header-v2';
import thumbnail_slideshow from './components/_3-thumbnail-slideshow';

function loaded() {
  devtools.init(IS_DEV);
  Util();
  anim_menu_btn();
  diagonal_movement();
  expandable_search();
  fetch_term();
  modal_window();
  modal_video();
  swipe_content();
  tooltip();
  smooth_scrolling();
  slideshow();
  main_header_v2();
  thumbnail_slideshow();
  svg_slideshow();
}

document.addEventListener('DOMContentLoaded', loaded);
