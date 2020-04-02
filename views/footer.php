<?php
//print_r($paginas);
?>

<div id="modalPrivacidade" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> <?php echo $paginas[0]['titulo']; ?> </h4>
      </div>
      <div class="modal-body">
        <?php echo $paginas[0]['corpo']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>

<div id="modalSobre" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  <?php echo $paginas[1]['titulo']; ?> </h4>
      </div>
      <div class="modal-body">
        <?php echo $paginas[1]['corpo']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>


<footer class="footer">

  <div class="container-fluid">
   
	<ul class="links-rodape">
      <li> <a class="privacidade"> Privacidade </a> </li>
  		<li> <a class="sobre"> Sobre </a> </li>
      <li> <a href="<?php echo BASE_URL; ?>filmes/sugestao"> Sugerir filme </a> </li>
  </ul>	
    
  <p class="text-muted"> &copy; 2018. Todos os direitos reservados. <span class="nome_footer">Roberto Giffone</span> </p>

</div> 

  </div>

</footer>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/footer.js"></script>