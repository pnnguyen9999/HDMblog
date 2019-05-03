function Message(config){
  let default_config = {
    autoclosing:true,
    closingtiming:1000,
    container:null
  }

  this.config = Object.assign({},default_config,config);
}

Message.prototype.STYLE_CONFIG = {
  ALERT:'alert-warning',
  ERROR:'alert-danger',
  SUCCESS:'alert-success'
}

Message.prototype.create = function(message,style){
  let div = document.createElement("div");
  $(div).addClass("alert alert-dismissible fade show fixed-top " + style);
  $(div).attr("role","alert");
  $(div).text(message);

  let button = document.createElement("button");
  $(button).addClass("close");
  $(button).attr("data-dismiss","alert");
  $(button).attr("aria-label","Close");

  let span = document.createElement("span");
  $(span).attr("aria-hidden","true");
  $(span).html("&times;");

  $(button).append(span);
  $(div).append(button);

  if(this.config.container){
    $(container).append(div);
  }else{
    $("body").append(div);
  }

  if(this.config.autoclosing == true){
    setTimeout(function(){
      $(div).remove();
    },this.config.closingtiming);
  }
}
