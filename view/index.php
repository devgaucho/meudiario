<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Diário</title>
</head>
<body>
    <font face="sans-serif">
        <center>
            <table width="1280">
                <tr>
                    <td align="left">  
                        <center>  
                        <h1>Diário</h1>
                        <form method="post" action="index.php">
                            <textarea name="mensagem" cols="70" rows="7" lang="pt-br"></textarea><br><br>
                                <button type="submit">Enviar</button>
                        </form><br>                        
                        <?php
                        if($mensagens){
                            foreach($mensagens as $mensagem){
                                $msgStr=$mensagem['mensagem'];    
                                $lenInt=mb_strlen($msgStr);      
                                //print '<img src="silver75.gif" width="75" height="75" hspace="10" vspace="10" align="left">';                                  
                                print '<br><font color="gray">';
                                print '<small>'.strtolower(date('dMY H:i',$mensagem['createdAt'])).' ['.$lenInt.' chars]</small>';                       
                                print '</font><br>';
                                print '<br><font size="4" color="#333"><b>'.nl2br(htmlentities($msgStr)).'</b></font>';                                
                                print '<br><br><hr NOSHADE size="1" color="silver">';
                            }
                        }else{
                            print 'escreva uma mensagem';
                        }
                        ?>         
                        </center>            
                    </td>
                </tr>
            </table>
        </center>
    </font>
</body>
</html>
