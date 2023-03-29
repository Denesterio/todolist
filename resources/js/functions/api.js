const host = window.location.href;
const routes = {
    todo: (userId, id) => [host, 'users', userId, 'todos', id].join('/'),
};

const post = async (entity, data) => {
    const response = await fetch(routes[entity](data.userId, data.id), {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data.data)
    });

    return response.json();
};

export { post };
