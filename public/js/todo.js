/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/todo.js ***!
  \******************************/
var formContainer = document.getElementById('form-container');
var titleContainer = document.getElementById('title-container');
var titleEdit = document.getElementById('title-edit');
var titleSave = document.getElementById('title-save');
var descriptionContainer = document.getElementById('description-container');
var descriptionEdit = document.getElementById('description-edit');
var descriptionSave = document.getElementById('description-save');
var getTodoItems = function getTodoItems(listId) {
  var itemsList = document.getElementById(listId);
  var items = itemsList.querySelector('[data-id]');
  var result = [];
  for (var item in items) {
    result.push({
      content: item.textContent,
      mode: 'read'
    });
  }
  return result;
};
var switchMode = function switchMode(currentMode) {
  return currentMode === 'read' ? 'edit' : 'read';
};
var state = {
  status: 'save',
  title: {
    content: titleContainer.firstChild.textContent,
    mode: 'read'
  },
  description: {
    content: descriptionContainer.firstChild.textContent,
    mode: 'read'
  },
  items: getTodoItems('todo-items-list')
};
console.dir(state);
formContainer.addEventListener('click', function (event) {
  console.log('event');
  switch (event.target.id) {
    case 'title-edit':
      state.title.mode = switchMode(state.title.mode);
    case 'description-edit':
      state.description.mode = switchMode(state.description.mode);
  }
});
/******/ })()
;