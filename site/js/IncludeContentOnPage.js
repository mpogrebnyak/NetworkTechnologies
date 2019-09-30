function includeContent(viewName, parent) {
    var link = document.querySelector(viewName);
    var content = link.import.querySelector(viewName);
    document.querySelector(parent).appendChild(content.cloneNode(true));
}