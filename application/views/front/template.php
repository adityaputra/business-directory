<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('front/top_resources'); ?>
</head>
<body>
    <header>
        <h1>Ini Dari Template</h1>
        <?php $this->load->view('front/header'); ?>
    </header>
    <main >
        <?php $this->load->view('front/navbar'); ?>
        <?php $this->load->view($content); ?>
    </main>
    <footer>
        <?php $this->load->view('front/footer'); ?>
    </footer>
        <?php $this->load->view('front/bottom_resources'); ?>
</body>
</html>

        
                    
                
    