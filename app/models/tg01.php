<?php

class tg01 extends Eloquent {

    protected $table = 'tg01';
    protected $primaryKey = 'idtg';

    function getAutoIncrement() {
        $sql = "SELECT AUTO_INCREMENT as idtg FROM information_schema.tables WHERE  TABLE_SCHEMA = 'absensi' AND TABLE_NAME = 'tg01'";
        $idtg = DB::select(DB::raw($sql));
        $idtg = $idtg[0];
        return $idtg->idtg;
    }

    function getDetailHariGaji($idkar, $date) {
        $sql = "SELECT mg01.*, mg02.mk01_id, mg02.mg01_id, mg02.nilgj, 
                CASE WHEN mg01.jntgh = 'Bulan' 
                THEN 
                        period_diff(date_format(now(), '%Y%m'), date_format(karyawan.tglgj, '%Y%m'))
                ELSE 
                        CASE WHEN mg01.jntgh = 'Hari' 
                        THEN 
                                (SELECT COUNT(*) FROM ta02 WHERE ta02.abscd = 0 AND ta02.mk01_id = karyawan.idkar AND MONTH(ta02.tglmsk) = MONTH('$date'))
                        ELSE 
                (SELECT 
                COALESCE(FLOOR((SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.overWorkOut, '%H:%i'), DATE_FORMAT(tabel_terluar.overWorkIn, '%H:%i'))) as integer),0)) / 3600)), 0) as nilai
                FROM ( 
                    SELECT DISTINCT         
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 4 ) as overWorkIn,
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 5 ) as overWorkOut,
                        mk01_id
                    FROM ta02 as tabel_luar 
                        WHERE MONTH(tabel_luar.tglmsk) = MONTH('$date') AND YEAR(tabel_luar.tglmsk) = YEAR('$date')
                    ) as tabel_terluar
                    WHERE mk01_id = karyawan.idkar
                GROUP BY mk01_id)
                        END 
                END as jmltglgj
                FROM mg02 
                INNER JOIN mg01 ON mg01.idgj = mg02.mg01_id 
                INNER JOIN mk01 as karyawan ON karyawan.idkar = mg02.mk01_id
                WHERE karyawan.idkar = $idkar;";
//        echo $sql; exit;
        return $detail = DB::select(DB::raw($sql));
    }

}
