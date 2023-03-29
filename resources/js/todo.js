import { post } from './functions/api.js';

const formContainer = document.getElementById('form-container');
const titleContainer = document.getElementById('title-container');
const titleEdit = document.getElementById('title-edit');
const titleSave = document.getElementById('title-save');
const descriptionContainer = document.getElementById('description-container');
const descriptionEdit = document.getElementById('description-edit');
const descriptionSave = document.getElementById('description-save');
const itemsList = document.getElementById('todo-items-list');

const getTodoItems = (itemsList) => {
    const items = itemsList.querySelectorAll('[data-id]');
    const result = [];
    for (const item of items) {
        result.push({ content: item.textContent, mode: 'read' });
    }
    return result;
};

const switchMode = (currentMode) => {
    return currentMode === 'read' ? 'edit' : 'read';
};

const getId = (key) => {
    const keyLength = key.length + 2;
    const index = window.location.pathname.indexOf(`/${key}/`);
    if (index !== -1) {
        const lastIndex = window.location.pathname.indexOf('/', index + keyLength) === -1 ? window.location.pathname.length : window.location.pathname.indexOf('/', index + 7);
        return window.location.pathname.substring(index + keyLength, lastIndex);
    }
    return null;
}

const state = {
    status: 'save',
    id: getId('todos'),
    userId: getId('users'),
    title: {
        content: titleContainer.firstElementChild.textContent,
        mode: 'read',
    },
    description: {
        content: descriptionContainer.firstElementChild.textContent,
        mode: 'read',
    },
    items: getTodoItems(itemsList),
};

console.dir(state);

formContainer.addEventListener('click', (event) => {
    switch (event.target.id) {
        case 'title-edit':
            if (state.title.mode === 'edit') {
                post('todo', { data: state.title.content, id: state.id, userId: state.userId });
            }
            state.title.mode = switchMode(state.title.mode);
        case 'description-edit':
            state.description.mode = switchMode(state.description.mode);
    }
});
