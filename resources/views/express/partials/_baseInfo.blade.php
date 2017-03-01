<!-- 搜索框 -->
<form class="form" action="{{ route('web.express.search') }}" method="get" style="margin-bottom: 15px;">
    <div class="input-group">
        <input type="text" name="password" class="form-control" placeholder="输入专属密码查看情书" required>
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </span>
    </div>
</form>
<a href="javascript:;" id="express" class="btn btn-primary btn-block" style="margin-bottom: 15px;">
    开始表白
</a>
<div class="panel panel-default">
    <div class="panel-heading panel-white">
        <h3 class="panel-title">
            鸿雁传情
        </h3>
    </div>
    <div class="panel-body">
        <p style="text-indent: 2em;">
            鸿雁传情——为TA写下心中情，生成密码传给TA，TA搜一下密码就懂你。
        </p>
        <p style="text-indent: 2em;">
            喜欢TA，又不知道怎么跟TA说，后街胡同最强表白应用——鸿雁传情帮你表白，写一封信给TA，生成自定义专属密码，可以匿名的哦，后街胡同帮你转达表白。
        </p>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading panel-white">
        <h3 class="panel-title">
            注意事项
        </h3>
    </div>
    <div class="panel-body">
        <ul class="express-ul">
            <li>可以选择是否在表白墙公示</li>
            <li>拥有密码即可通过搜索查看情书</li>
            <li>表白情书发布不予以删除</li>
            <li>禁止发布辱骂，违法等信息</li>
            <li>如果表白成功记得帮忙宣传下哦</li>
        </ul>
    </div>
</div>