<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <div id="app">
            <ul>
                <li v-for="itenm in studentList">
                    <div>{{itenm.name}}</div>
                    <input type="checkbox" v-on:click="saveToDB($event, itenm.student_id)" :checked="false"/>
                </li>
            </ul>
        </div>
    </body>
    <script src="//cdn.bootcss.com/vue/2.1.0/vue.js" type="text/javascript" charset="utf-8"></script>
    <script src="//cdn.bootcss.com/vue-resource/1.0.3/vue-resource.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        new Vue({
            el:'#app',
            data:{
                studentList:[],
                getStudentListUrl: '/data/student-list.json',
                test: false,
                selected:[],
            },
            created: function(){
                this.getTopic()
            },
            methods:{
                getTopic:function(){
                    var self = this;
                    self.$http({
                        method:'GET',
                        url:this.getStudentListUrl
                    }).then(function(response){
                        this.studentList = response.data.data;
                    },function(error){
                        //error
                    })
                },
                saveToDB: function (e, title) {
                    if (!confirm('are you sure?')) {
                        e.preventDefault()
                    } else {
                        if(e.target.checked){
                            console.log('add');
                            console.log(title);
                        } else {
                            console.log('no add');
                        }
                    }
                }
            }
        })
    </script>
</html>
