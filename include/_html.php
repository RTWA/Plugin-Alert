<div class="Alert">
    <div class="bg-<?php echo $this->settings['style']; ?>-200 border-<?php echo $this->settings['style']; ?>-600 text-<?php echo $this->settings['style']; ?>-600 border-l-4 p-4" role="alert">
        <p class="font-bold">
            <?php echo $this->settings['title']; ?>
        </p>
        <?php
            if ($this->settings['message'] <> '') {
                echo "<p>".$this->settings['message']."</p>";
            }
        ?>
    </div>
</div>
