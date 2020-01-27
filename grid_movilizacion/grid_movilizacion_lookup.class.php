<?php
class grid_movilizacion_lookup
{
//  
   function lookup_idusuario(&$conteudo , $idusuario) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idusuario; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;" || trim($idusuario) === "" || trim($idusuario) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT usuario_nombres + ' ' + usuario_apellidos  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(usuario_nombres,' ',usuario_apellidos)  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT usuario_nombres&' '&usuario_apellidos  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT usuario_nombres||' '||usuario_apellidos  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT usuario_nombres + ' ' + usuario_apellidos  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT usuario_nombres||' '||usuario_apellidos  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT usuario_nombres||' '||usuario_apellidos  FROM usuario where idusuario = $idusuario order by usuario_nombres, usuario_apellidos" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_idvehiculo(&$conteudo , $idvehiculo) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idvehiculo; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;" || trim($idvehiculo) === "" || trim($idvehiculo) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT Vehiculo_Modelo + ' ' + Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(Vehiculo_Modelo,' ',Vehiculo_Placa)  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT Vehiculo_Modelo&' '&Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT Vehiculo_Modelo||' '||Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT Vehiculo_Modelo + ' ' + Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT Vehiculo_Modelo||' '||Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT Vehiculo_Modelo||' '||Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_movilizacion_funcionario(&$conteudo , $movilizacion_funcionario) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $movilizacion_funcionario; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      $verif_cmp_mult = explode(";", $conteudo);
      $conteudo = "";
      foreach ($verif_cmp_mult as $cada_ocorr)
      {
          if (!empty($conteudo))
          {
              $conteudo .= "','";
          }
          $conteudo .= $cada_ocorr;
      }
      $movilizacion_funcionario = $conteudo;
      $nm_comando = "select concat(usuario_nombres,' ',usuario_apellidos) from usuario where idusuario  IN ('$movilizacion_funcionario') order by usuario_nombres" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF) 
          { 
                 if ($y != 0)
                 { 
                     $conteudo .= "<br>";
                 } 
                 $y++; 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        if ($x != 0)
                        { 
                            $conteudo .= " - ";
                        } 
                        $conteudo .= trim($rx->fields[$x]); 
                 }
                 $rx->MoveNext() ;
          }  
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
