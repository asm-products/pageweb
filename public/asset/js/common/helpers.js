function parse_str(str) {
    var arr = {}, parts = str.split('&'), part;
    for (part in parts) {
        if (parts.hasOwnProperty(part)) {
            var item = parts[part].split('=');
            arr[item[0]] = item[1];
        }
    }

    return arr;
}

function build_query(arr) {
    var item, query = '';
    for (item in arr) {
        if (arr.hasOwnProperty(item)) {
            query += '&' + item + '=' + arr[item];
        }
    }

    return query.substr(1);
}

function http_replace_query(url, replace) {
    var parts = url.split('?'),
        query = parse_str(parts[1]);
    url = parts[0];

    return url + (query ? '?' + build_query($.extend(query, replace)) : '');
}