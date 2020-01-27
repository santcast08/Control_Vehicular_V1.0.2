<?php
class grid_mantenimiento_lookup
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
          $nm_comando = "SELECT Vehiculo_Marca + ' ' + Vehiculo_Modelo + ' ' + Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(Vehiculo_Marca,' ',Vehiculo_Modelo,' ',Vehiculo_Placa)  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT Vehiculo_Marca&' '&Vehiculo_Modelo&' '&Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT Vehiculo_Marca||' '||Vehiculo_Modelo||' '||Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT Vehiculo_Marca + ' ' + Vehiculo_Modelo + ' ' + Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT Vehiculo_Marca||' '||Vehiculo_Modelo||' '||Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT Vehiculo_Marca||' '||Vehiculo_Modelo||' '||Vehiculo_Placa  FROM vehiculos where IdVehiculo = $idvehiculo order by Vehiculo_Marca, Vehiculo_Modelo, Vehiculo_Placa" ; 
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
   function lookup_idtipo_mantenimiento(&$conteudo , $idtipo_mantenimiento) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $idtipo_mantenimiento; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($idtipo_mantenimiento) === "" || trim($idtipo_mantenimiento) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select Tipo from tipo_mantenimiento where idTipo_Mantenimiento = $idtipo_mantenimiento order by Tipo" ; 
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
}
?>
