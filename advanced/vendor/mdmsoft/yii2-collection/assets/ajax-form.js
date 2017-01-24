$(function(){
    //ajax get请求
    $('.ajax-get').click(function(){
        var target;
        var that = this;
        if ( $(this).hasClass('confirm') ) {
            if(!confirm('确认要执行该操作吗?')){
                return false;
            }
        }
        if ( (target = $(this).attr('href')) || (target = $(this).attr('url')) ) {
            $.get(target).success(function(data){
                if (data.status==1) {
                    if (data.url) {
                        layer.msg(data.info?data.info + ' 页面即将自动跳转~':data.message + ' 页面即将自动跳转~', function(){
                            location.href=data.url;
                        });
                    }else{
                        layer.msg(data.info?data.info:data.message, function(){
                            location.reload();
                        });
                    }
                }else{
                    layer.msg(data.info?data.info:data.message);
                }
            });

        }
        return false;
    });
    //ajax post submit请求
    $('.ajax-post').click(function(){
        var target,query,form;
        var target_form = $(this).attr('target-form');
        var that = this;
        var nead_confirm=false;
        if( ($(this).attr('type')=='submit') || (target = $(this).attr('href')) || (target = $(this).attr('url')) ){
            form = $('.'+target_form);

            if ($(this).attr('hide-data') === 'true'){//无数据时也可以使用的功能
                form = $('.hide-data');
                query = form.serialize();
            }else if (form.get(0)==undefined){
                return false;
            }else if ( form.get(0).nodeName=='FORM' ){
                if ( $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                if($(this).attr('url') !== undefined){
                    target = $(this).attr('url');
                }else{
                    target = form.get(0).action;
                }
                query = form.serialize();
            }else if( form.get(0).nodeName=='INPUT' || form.get(0).nodeName=='SELECT' || form.get(0).nodeName=='TEXTAREA') {
                form.each(function(k,v){
                    if(v.type=='checkbox' && v.checked==true){
                        nead_confirm = true;
                    }
                })
                if ( nead_confirm && $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                query = form.serialize();
            }else{
                if ( $(this).hasClass('confirm') ) {
                    if(!confirm('确认要执行该操作吗?')){
                        return false;
                    }
                }
                query = form.find('input,select,textarea').serialize();
            }
            $(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
            $.post(target,query).success(function(data){
                if(data.postFun){// 走自定义参数
                    postFun(data,$(that));
                    return false;
                }
                if (data.status==1) {
                    if (data.url) {
                        layer.msg(data.info?data.info + ' 页面即将自动跳转~':data.message + ' 页面即将自动跳转~', function(){
                            location.href=data.url;
                        });
                    }else{
                        layer.msg(data.info?data.info:data.message, function(){
                            location.reload();
                        });
                    }
                }else{
                    if (data.url) {
                        layer.msg(data.info?data.info:data.message, function(){
                            location.href=data.url;
                        });
                    }else{
                        layer.msg(data.info?data.info:data.message, function(){
                            $(that).removeClass('disabled').attr('autocomplete','on').prop('disabled',false);
                        });
                    }
                }
            });
        }
        return false;
    });
});