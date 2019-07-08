
//TestInterface();

 function ContactCommitChange()
{
	var loading = document.getElementById('loading');
	loading.innerText ="LOADING ...";
    setTimeout(()=>{

    let info = Array.from(document.getElementsByClassName('item_e'));//$('#item_e');
    let cf = document.getElementsByClassName('item_g')[0];
   //	alert(cf);
        
                    $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                         });
                   		 var formData = new FormData(); 
                   		 //cf.children[0].innerText;

                   		 formData.append('bankinfo1', info[0].children[0].children[0].innerText);
                   		 formData.append('bankaccount1', info[0].children[1].innerText);

                   		 formData.append('bankinfo2', info[0].children[2].children[0].innerText);
                   		 formData.append('bankaccount2', info[0].children[3].innerText);

                   		 formData.append('bankinfo3', info[0].children[4].children[0].innerText);
                   		 formData.append('bankaccount3', info[0].children[5].innerText);

                   		 formData.append('other1', cf.children[0].innerText );
                   		 formData.append('other2', cf.children[1].innerText );
                   		 formData.append('contactnumber', cf.children[2].innerText );
                   		 formData.append('address', cf.children[3].innerText );

                       //console.log(formData.values());

                         var promiseAjax2 = $.ajax({
                            type: "post",
                            url: "/contactedit",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                         });

                		 promiseAjax2
                           .done(()=>{
                               
                                loading.innerText ="Commit Complete  :3 ";
                            });   
                        

    },600);
}
