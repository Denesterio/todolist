const renderInput = (attrs = {}) => {
    const input = document.createElement('input');
    input.className.add(attrs.class);
    input.value = attrs.value;
    input.name = attrs.name;
    input.id = attrs.id;
};

// const renderList = (data = []) => {
//     if (data.length > 0) {}
// }
