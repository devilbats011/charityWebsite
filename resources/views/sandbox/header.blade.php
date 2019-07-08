         <div style="background:#AAAA;border-top-right-radius: 8px;border-top-left-radius: 8px;    padding: 20px 30px 0px 30px;" class="card-header"><h2>title </h2>
            </div>

            <main class="edit-header" style="min-height: 400px;" >
                
                <div class="tunjukGambar">
                    <img src="{{asset('storage/download_img/gambar1.jpg')}}" id="img_tunjukGambar">
                    <p>Gambar 1</p>
                </div>
            <form method="post" enctype="multipart/form-data" action="{{route('StoreHeader')}}"  style="margin:5px;" id="StoreHeader" >
                <ul> <li onclick="TunjukGambar(0)" >Gambar 1</li> <li onclick="TunjukGambar(1)" >Gambar 2</li> <li onclick="TunjukGambar(2) ">Gambar 3</li></ul>
                <div id="formGambarHeader">
                    <center>
                       <!-- {{csrf_field()}} -->
                        <label><span> Tajuk </span>
                        <input type="text" name="tajuk" id="tajuk" >
                         </label><br>
                        <div style="width: 95%; background: crimson;color:white;text-align: center;margin-top:10px" > Content </div>
                        <textarea name="content" id="content"></textarea><br>
                        
                        <label>
                        <input type="file" name="gambar" id="gambar"> <br> 
                        </label>
                        <br>
                        <input type="submit" value="upload" ></input>
                       
                    </center>
                </div>
                </form>

            </main>