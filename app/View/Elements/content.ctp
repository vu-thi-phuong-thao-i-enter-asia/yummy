<style>
    @media (min-device-width: 300px) and (max-device-width: 800px){
        .container {
            width: 100%;
        }
    }
</style>
<div class="container-fluid">
    <?php
    echo $this->Flash->render();
    echo $this->fetch("content");
    ?>
</div>