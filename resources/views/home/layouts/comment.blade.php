<div class="card" id="app">
    <div class="card-body">

        <!-- Comments -->

        <div class="comment mb-3" v-for="v in comments">
            <div class="row">
                <div class="col-auto">

                    <!-- Avatar -->
                    <a class="avatar" href="">
                        <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle">
                    </a>

                </div>
                <div class="col ml--2">

                    <!-- Body -->
                    <div class="comment-body">

                        <div class="row">
                            <div class="col">

                                <!-- Title -->
                                <h5 class="comment-title">
                                    @{{v.user.name}}
                                </h5>

                            </div>
                            <div class="col-auto">

                                <!-- Time -->
                                <time class="comment-time">
                                    玫瑰| @{{ v.created_at }}
                                </time>
                            </div>
                        </div> <!-- / .row -->

                        <!-- Text -->
                        <p class="comment-text" v-html="v.content">
                        </p>

                    </div>

                </div>
            </div> <!-- / .row -->
        </div>


        <!-- Divider -->
        <hr>

        <!-- Form -->
        @auth()
            <div class="row align-items-start">
                <div class="col-auto">

                    <!-- Avatar -->
                    <div class="avatar">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </div>

                </div>
                <div class="col ml--2">

                    <div id="editormd">
                        <textarea style="display:none;"></textarea>
                    </div>
                    <button class="btn btn-primary" @click.prevent="send()">发表评论</button>

                </div>
            </div> <!-- / .row -->
        @else
            <p class="text-muted text-center">请 <a href="{{route('login',['from'=>url()->full()])}}">登录</a> 后评论</p>
        @endauth
    </div>
    {{--@{{comment}}--}}
</div>
@push('js')

        <script>
            require(['hdjs', 'vue', 'axios', 'MarkdownIt', 'marked', 'highlight'], function (hdjs, Vue, axios, MarkdownIt, marked) {
                var vm = new Vue({
                    el:'#app',
                    // 当前的评论数据 comment:{content:''}
                    //全部的评论  comments:[]
                    data:{comment: {content: ''},
                        comments: []},

                    methods:{
                        @auth
                        // 点击提交按钮方法 提交评论
                        send(){
                            // alert(1);
                            //  判断 如果评论为空的话 不能提交
                            //    trim()去除两边的空格
                            if (this.comment.content.trim() == ''){
                                hdjs.swal({
                                    text: "请输入评论内容",
                                    button: false,
                                    icon: 'warning'
                                });
                                return false;
                            }
                            // axios 框架内部集成了 axios 异步通信组件，可实现方便的异步操作
                            // axios.post(第一个参数(home.comment.store)：请求的地址
                            //             第二个参数(comment:this.comment.content):请求的内容
                            axios.post('{{route('home.comment.store')}}', {
                                content: this.comment.content,
                                article_id: '{{$article['id']}}'
                            }).then((response)=>{
                                //console.log(response.data.comment); //报500 路由的方式错了
                                // 从数据库后面追加评论
                                this.comments.push(response.data.comment);
                                //将 markdown 转为 html
                                let md=new  MarkdownIt();
                                // render()渲染
                                response.data.comment.content = md.render(response.data.comment.content)
                                $(document).ready(function () {
                                    $('pre code').each(function (i, block) {
                                        hljs.highlightBlock(block);
                                    });
                                });
                                // /清空 vue 数据
                                this.comment.content = '';
                                //清空编辑器内容
                                //选中所有内容
                                editormd.setSelection({line:0, ch:0}, {line:9999999, ch:9999999});
                                //将选中文本替换成空字符串
                                editormd.replaceSelection("");
                            });
                        },
                        @endauth
                    },

                    // 挂载

                    mounted(){
                        @auth
                        // 渲染编辑器
                        hdjs.editormd("editormd", {
                            width: '100%',
                            height: 300,
                            toolbarIcons : function() {
                                return [
                                    "undo","redo","|",
                                    "bold", "del", "italic", "quote","|",
                                    "list-ul", "list-ol", "hr", "|",
                                    "link", "hdimage", "code-block", "|",
                                    "watch", "preview", "fullscreen"
                                ]
                            },
                            //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                            server:'',
                            //editor.md库位置
                            path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                            // 监听编辑器的变化 使用onchange方法
                            onchange:function () {
                                // 给vu中的对象comment属性中的content元素设置（vm.$set）值（this.getValue()）
                                vm.$set(vm.comment, 'content', this.getValue());
                            }
                        });
                        @endauth
                        axios.get('{{route("home.comment.index",['article_id'=>$article['id']])}}')
                            .then((response)=>{
                                // console.log(response.data.comment); //报500 路由的方式错了
                                // 从数据库后面追加评论

                                this.comments = response.data.comments;
                                //将 markdown 转为 html
                                let md=new  MarkdownIt();
                                // 循环所有的评论数据
                                // render 渲染
                                this.comments.forEach((v, k) => {
                                    v.content = md.render(v.content)});
                                $(document).ready(function () {
                                    $('pre code').each(function (i, block) {
                                        hljs.highlightBlock(block);
                                    });
                                });
                            });
                    },
                });
            })
        </script>
@endpush