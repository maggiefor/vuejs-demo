Vue.component('hello-world', function (resolve, reject) {
    // 可以请求一个html文件，既然存放模板还是html文件存放比较好
    $.get("/component/hello-world-tp.html").then(function (res) {
        resolve({
            template: res
        })
    });
});
var vm = new Vue({
    el: "#watch-example"
})
