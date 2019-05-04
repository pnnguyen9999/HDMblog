$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".approve-confession-btn").on('click',function(e){
  let confession_id = $(this).data('confession-id');
  let container = $("#confession-card-" + confession_id);
  $.ajax({
    type:'GET',
    url:'/admin/confession/approve/' + confession_id,
    success:function(data){
      console.log(data);
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
      console.log(jqXHR.responseText);
    }
  });
});

$(".delete-confession-btn").on("click",function(e){
  let confession_id = $(this).data("confession-id");
  let container = $("#confession-card-" + confession_id);
  $.ajax({
    type:'GET',
    url:'/admin/confession/delete/' + confession_id,
    success:function(data){
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

  $(".merge-checkbox:checked").each(function(index){
    let confession_id = $(this).data("confession-id");
    mergeVals.push(confession_id);

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
    },
    error:function(jqXHR,exception){
      console.log(jqXHR.responseText);
    }
  });
});
