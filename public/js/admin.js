$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".approve-confession-btn").on('click',function(e){
  let confession_id = $(this).data('confession-id');
  let container = $("#confession-card-" + confession_id);
  let txt_area = $("#txt-area-" + confession_id);

  $("#loading-container").addClass("is-open");
  $.ajax({
    type:'POST',
    url:'/admin/confession/approve',
    data:{
      confession_id:confession_id,
      confession_content:$(txt_area).val()
    },
    success:function(data){
      console.log(data);
      $("#loading-container").removeClass("is-open");
      let json = JSON.parse(data);
      if(json["message_code"] == -1){
        let message = new Message({
          autoclosing:false
        });
        message.create(json["message"],message.STYLE_CONFIG.ERROR);
      }else{
        let message = new Message({
          closingtiming:5000
        });
        message.create(json["message"],message.STYLE_CONFIG.SUCCESS);
        $(container).remove();
      }
    },
    error:function(jqXHR,exception){
      $("#loading-container").removeClass("is-open");
      console.log(jqXHR.responseText);
    }
  });
});

$(".delete-confession-btn").on("click",function(e){
  let confession_id = $(this).data("confession-id");
  let container = $("#confession-card-" + confession_id);
  $("#loading-container").addClass("is-open");

  $.ajax({
    type:'DELETE',
    url:'/admin/confession/delete',
    data:{
      confession_id:confession_id
    },
    success:function(data){
      $("#loading-container").removeClass("is-open");
      let json = JSON.parse(data);
      if(json["message_code"] == -1){
        let message = new Message({
          autoclosing:false
        });
        message.create(json["message"],message.STYLE_CONFIG.ERROR);
      }else{
        let message = new Message({
          closingtiming:5000
        });
        message.create(json["message"],message.STYLE_CONFIG.ALERT);
        $(container).remove();
      }
    },
    error:function(jqXHR,exception){
      $("#loading-container").removeClass("is-open");
      console.log(jqXHR.responseText);
    }
  });
});

$(".recover-confession-btn").on('click',function(e){
  let confession_id = $(this).data("confession-id");
  let container = $("#confession-card-" + confession_id);
  $("#loading-container").addClass("is-open");

  $.ajax({
    type:'POST',
    url:'/admin/confession/recover',
    data:{
      confession_id:confession_id
    },
    success:function(data){
      $("#loading-container").removeClass("is-open");
      let json = JSON.parse(data);
      if(json["message_code"] == -1){
        let message = new Message({
          autoclosing:false
        });
        message.create(json["message"],message.STYLE_CONFIG.ERROR);
      }else{
        let message = new Message({
          closingtiming:5000
        });
        message.create(json["message"],message.STYLE_CONFIG.ALERT);
        $(container).remove();
      }
    },
    error:function(jqXHR,exception){
      $("#loading-container").removeClass("is-open");
      console.log(jqXHR.responseText);
    }
  });
});

$(".complete-delete-confession-btn").on('click',function(e){
  let confession_id = $(this).data("confession-id");
  let container = $("#confession-card-" + confession_id);
  $("#loading-container").addClass("is-open");

  $.ajax({
    type:'DELETE',
    url:'/admin/confession/complete_delete',
    data:{
      confession_id:confession_id
    },
    success:function(data){
      $("#loading-container").removeClass("is-open");
      let json = JSON.parse(data);
      if(json["message_code"] == -1){
        let message = new Message({
          autoclosing:false
        });
        message.create(json["message"],message.STYLE_CONFIG.ERROR);
      }else{
        let message = new Message({
          closingtiming:5000
        });
        message.create(json["message"],message.STYLE_CONFIG.ALERT);
        $(container).remove();
      }
    },
    error:function(jqXHR,exception){
      console.log(jqXHR.responseText);
    }
  });
});

var countMergeChecked = 0;

$(".merge-checkbox").change(function(e){
  let checked = $(this).is(":checked");
  let val = checked ? 1 : -1;
  countMergeChecked += val;

  if(countMergeChecked > 0){
    $("#acceptAll").show();
    $(".cf-btn").attr("disabled","true");
  }else{
    $("#acceptAll").hide();
    $(".cf-btn").removeAttr("disabled");
  }

  $("#countText").val(countMergeChecked);
});

$("#acceptAll").on('click',function(e){
  let mergeVals = [];
  let containers = [];
  $("#loading-container").addClass("is-open");

  $(".merge-checkbox:checked").each(function(index){
    let confession_id = $(this).data("confession-id");
    let confession_content = $("#txt-area-" + confession_id).val();

    let data = {
      confession_id:confession_id,
      confession_content:confession_content
    }
    mergeVals.push(data);

    let container = $("#confession-card-" + confession_id);
    containers.push(container);
  });

  let valsAsJSON = JSON.stringify(mergeVals);

  $.ajax({
    type:'POST',
    url:'/admin/confession/merge_approve_confession',
    data:{
      checkedConfessionIDs:valsAsJSON
    },
    success:function(data){
      $("#loading-container").removeClass("is-open");
      let json = JSON.parse(data);
      if(json["message_code"] == -1){
        let message = new Message({
          autoclosing:false
        });
        message.create(json["message"],message.STYLE_CONFIG.ERROR);
      }else{
        let message = new Message({
          closingtiming:5000
        });
        message.create(json["message"],message.STYLE_CONFIG.SUCCESS);

        for(var i = 0; i < containers.length;i++){
          $(containers[i]).remove();
        }
      }

      //restart value
      $("#countText").val(0);
      $("#acceptAll").hide();
      $(".cf-btn").removeAttr("disabled");
    },
    error:function(jqXHR,exception){
      $("#loading-container").removeClass("is-open");
      console.log(jqXHR.responseText);
    }
  });
});
