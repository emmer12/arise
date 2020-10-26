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
        <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
        <small id="fileHelpId" class="form-text text-muted">Help text</small>
      </div>


       <div class="form-group">
        <label for="">File</label>
        <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
        <small id="fileHelpId" class="form-text text-muted">Help text</small>
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
        file:''
      }
    }
  },
  methods: {
    submit(){

      axios.post('/api/create-product',this.newPost).then(()=>{
        alert('posted')
      }).catch(err=>{
        alert('Opps, something went wrong')
      })
       
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
    box-shadow: 2px 2px 4px 2px #ddd;
  }
</style>