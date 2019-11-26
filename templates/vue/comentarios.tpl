{literal}
    <div 
        id="container" data-objectId="{$libro.id_libro}" data-userId="{$user.id}" data-userAdmin="{$user.admin}">
        <p>Objeto: <span id="objId"></span></p>
        <p>Usuario: <span id="usrId"></span></p>
        <p>Admin: <span id="usrAdm"></span></p>
    </div>
   <section id="template-vue-comentarios">
    <h5> {{ subtitle }} </h5>

    <ul>
       <li v-for="comentario in comentarios"> 
           <span>{{comentario.valoracion}} </span>
           <span>{{comentario.comentario}} </span>

        <span>
        <button v-on:click="deleteComment(comentario.id_comentario)" class="btn btn-danger btn-sm">Eliminar</button>
        </span>
       </li> 
    </ul>

    <div>
        <h6>Agregar comentario</h6>
        <form  method="POST" id="form-comment" @submit.prevent="addComment">
            <div class="form-group">
                <label> valoracion: </label>
                <input value=" " name="valoracion" type="text" class="form-control" placeholder="Valoracion">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">comentario:</label>
              <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Agregar comentario</button>
            </div>
        </form>
    </div>

</section>
{/literal}