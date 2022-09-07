DROP VIEW v_ulti_ckpt_desactualizado;
CREATE VIEW v_ulti_ckpt_desactualizado AS
select nume_guia, codi_ckpt, ulti_ckpt, ulti_esta, ulti_fech, ulti_hora, ulti_obse
  from (select nume_guia,
               codi_ckpt,
               (select guia_ckpt.codi_ckpt
                  from guia_ckpt
                 where guia_ckpt.nume_guia = guia.nume_guia
                 order by fech_ckpt desc,
                          hora_ckpt desc
                 limit 1) ulti_ckpt,
               (select guia_ckpt.codi_esta
                  from guia_ckpt
                 where guia_ckpt.nume_guia = guia.nume_guia
                 order by fech_ckpt desc,
                          hora_ckpt desc
                 limit 1) ulti_esta,
               (select guia_ckpt.fech_ckpt
                  from guia_ckpt
                 where guia_ckpt.nume_guia = guia.nume_guia
                 order by fech_ckpt desc,
                          hora_ckpt desc
                 limit 1) ulti_fech,
               (select guia_ckpt.hora_ckpt
                  from guia_ckpt
                 where guia_ckpt.nume_guia = guia.nume_guia
                 order by fech_ckpt desc,
                          hora_ckpt desc
                 limit 1) ulti_hora,
               (select guia_ckpt.text_obse
                  from guia_ckpt
                 where guia_ckpt.nume_guia = guia.nume_guia
                 order by fech_ckpt desc,
                          hora_ckpt desc
                 limit 1) ulti_obse
          from guia
         where nume_guia in (select distinct nume_guia
                               from guia_ckpt
                              where fech_ckpt >= date_sub(curdate(), interval 15 day))
       ) x
 where codi_ckpt != ulti_ckpt