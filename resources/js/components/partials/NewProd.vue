<template>
  <div class="product-form" >
      <form v-on:submit.prevent>
       <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="" id="title" v-model="newPost.title" class="form-control" placeholder="Title" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
       </div>

       <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="" id="desc" v-model="newPost.description" class="form-control" cols="30" rows="10"></textarea>
        <small id="helpId" class="text-muted">Help text</small>
      </div>


      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" v-model="newPost.author" id="author" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
      </div>

      
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" v-model="newPost.price" name="" id="price" class="form-control" placeholder="" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Help text</small>
      </div>

      <div class="form-group">
        <label for="">Dislay images</label>
     <div class="progress" v-if="progress && type=='display'">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                  :style="{'width':progress+'%'}">{{progress+'%'}}</div>
              </div>
        <input type="file" class="form-control-file" name="display" id="" placeholder="" @change="handleUpload" aria-describedby="fileHelpId">
        <small id="fileHelpId" class="form-text text-muted">Help text</small>
      </div>
      
       <div class="form-group">
        <label for="">File</label>
      <div class="progress"  v-if="progress && type=='file'">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                  :style="{'width':progress+'%'}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{progress+'%'}}</div>
          </div>
        <input type="file" class="form-control-file" name="file" id="" placeholder=""  @change="handleUpload"  aria-describedby="fileHelpId">
        <small id="fileHelpId" class="form-text text-muted">Help </small>
      </div>


      <button class="btn btn-primary btn-block"  @click="submit" >Post</button>


      </form>
  </div>
</template>

<script>
import axios from 'axios'
export default {


  data() {
    return {
      newPost:{
        title:'',
        description:'',
        author:'',
        price:'',
        desplayImg:'',
        file:'',
      },
        progress:0,
        type:null
    }
  },
  methods: {
    submit(){
      axios.post('/api/create-product',this.newPost).then(()=>{
        alert('posted')
      }).catch(err=>{
        alert('Opps, something went wrong')
      })
    },
    uploadFile(file,field){
                let formData=new FormData();
                
                formData.append('file',file);
                formData.append('field',field);

                axios.post('/api/upload-file',formData,{
                    onUploadProgress:progressEvent=>{
                        let progress=Math.round(progressEvent.loaded/progressEvent.total*100)
                        this.progress=progress;
                    }
                })
                .then(response=>{                    
                  this.type=response.data.filetype;
                })
                .catch(err=>{
                    console.log("fail");
                    
            })
    },
    handleUpload(e){
      let fileChunck=e.target.files[0];
      let field=e.target.name;
      this.uploadFile(fileChunck,field)
    }
  },



}
</script>

<style lang="scss" scoped>
  .product-form{
    max-width: 500px;
    background: #fcfcff;
    color: #444;
    margin: auto;
    padding: 10px;
    // box-shadow: 2px 2px 4px 2px #ddd;

   .progress{
  height:4px;
  width:100%;
  background:#f7f6f6;

   .progress-bar{
    transition:0.3s;
    background:#21ba45;
    height:100%;
    width:0%;
  }
}

    input{
      padding: 20px;
      border-radius:0px
    }
  }
</style>