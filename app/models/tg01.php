<?php

class tg01 extends Eloquent {

    protected $table = 'tg01';
    protected $primaryKey = 'idtg';

    function mk01() {
        return $this->belongsTo('mk01');
    }

    function tg02() {
        return $this->hasMany('tg02');
    }

    function getAutoIncrement() {
        $sql = "SELECT AUTO_INCREMENT as idtg FROM information_schema.tables WHERE  TABLE_SCHEMA = 'absensi' AND TABLE_NAME = 'tg01'";
        $idtg = DB::select(DB::raw($sql));
        $idtg = $idtg[0];
        return $idtg->idtg;
    }

    function getJumlahHariGaji($idkar, $date) {
        /*
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
         * 
         */

        $sql = "SELECT mg01.*, mg02.mk01_id, mg02.mg01_id, mg02.nilgj, 
                CASE WHEN mg01.jntgh = 'Bulan' 
                THEN 
                        period_diff(date_format(DATE_ADD(karyawan.tglgj, INTERVAL 1 MONTH), '%Y%m'), date_format(karyawan.tglgj, '%Y%m'))
                ELSE 
                        CASE WHEN mg01.jntgh = 'Hari' 
                        THEN 
                                (SELECT                                  
                                SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.goHome, '%H:%i'), DATE_FORMAT(tabel_terluar.goWork, '%H:%i'))) as integer),0)) - SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.breakIn, '%H:%i'), DATE_FORMAT(tabel_terluar.breakOut, '%H:%i'))) as integer),3600)) 
                                FROM ( 
                                    SELECT DISTINCT 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 0 ) as goWork, 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 2 ) as breakOut, 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 3 ) as breakIn, 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 1 ) as goHome,
                                        mk01_id
                                    FROM ta02 as tabel_luar 
                                        WHERE MONTH(tabel_luar.tglmsk) = MONTH('$date') AND YEAR(tabel_luar.tglmsk) = YEAR('$date')
                                    ) as tabel_terluar
                                    WHERE mk01_id = karyawan.idkar
                                GROUP BY mk01_id)
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
                END as jmtgh,
                CASE WHEN mg01.jntgh = 'Hari' THEN
                    (SELECT COUNT(*) FROM ta02 WHERE ta02.abscd = 0 AND ta02.mk01_id = karyawan.idkar AND MONTH(ta02.tglmsk) = MONTH('$date'))
                        ELSE
                            CASE WHEN mg01.jntgh = 'Bulan' THEN
                                period_diff(date_format(DATE_ADD(karyawan.tglgj, INTERVAL 1 MONTH), '%Y%m'), date_format(karyawan.tglgj, '%Y%m'))
                            ELSE
                                0 
                            END
                        END
                    as hari
                FROM mg02 
                INNER JOIN mg01 ON mg01.idgj = mg02.mg01_id 
                INNER JOIN mk01 as karyawan ON karyawan.idkar = mg02.mk01_id
                WHERE karyawan.idkar = $idkar;";
//        echo $sql; exit;
        return $detail = DB::select(DB::raw($sql));
    }

    function getJamKerjaInSec($idkar, $date) {
        $sql = "SELECT mg01.*, mg02.mk01_id, mg02.mg01_id, mg02.nilgj, 
                CASE WHEN mg01.jntgh = 'Bulan' 
                THEN 
                        period_diff(date_format(DATE_ADD('$date', INTERVAL 1 MONTH), '%Y%m'), date_format('$date', '%Y%m'))
                ELSE 
                        CASE WHEN mg01.jntgh = 'Hari' 
                        THEN 
                                (SELECT                                  
                                SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.goHome, '%H:%i'), DATE_FORMAT(tabel_terluar.goWork, '%H:%i'))) as integer),0)) - SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.breakIn, '%H:%i'), DATE_FORMAT(tabel_terluar.breakOut, '%H:%i'))) as integer),3600)) 
                                FROM ( 
                                    SELECT DISTINCT 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 0 ) as goWork, 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 2 ) as breakOut, 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 3 ) as breakIn, 
                                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 1 ) as goHome,
                                        mk01_id
                                    FROM ta02 as tabel_luar 
                                        WHERE MONTH(tabel_luar.tglmsk) = MONTH('$date') AND YEAR(tabel_luar.tglmsk) = YEAR('$date')
                                    ) as tabel_terluar
                                    WHERE mk01_id = karyawan.idkar
                                GROUP BY mk01_id)
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
                END as jmtgh,
                CASE WHEN mg01.jntgh = 'Hari' THEN
                    (SELECT COUNT(*) FROM ta02 WHERE ta02.abscd = 0 AND ta02.mk01_id = karyawan.idkar AND MONTH(ta02.tglmsk) = MONTH('$date'))
                        ELSE
                            CASE WHEN mg01.jntgh = 'Bulan' THEN
                                period_diff(date_format(DATE_ADD('$date', INTERVAL 1 MONTH), '%Y%m'), date_format('$date', '%Y%m'))
                            ELSE
                                0 
                            END
                        END
                    as hari
                FROM mg02 
                INNER JOIN mg01 ON mg01.idgj = mg02.mg01_id 
                INNER JOIN mk01 as karyawan ON karyawan.idkar = mg02.mk01_id
                WHERE karyawan.idkar = $idkar;";
//        echo $sql; exit;
        return $detail = DB::select(DB::raw($sql));
    }

    function getGajiStatusN($startdate = '', $enddate = '', $idkar = 0) {
        $sql = "SELECT tg01.*, mk01.nama FROM tg01 INNER JOIN mk01 ON mk01.idkar = tg01.idkar";
        if ($startdate != '' && $idkar != 0) {
            $sql .= "WHERE tg01.tgltg >= '$startdate' AND tg01.tgltg <= '$enddate' AND tg01.idkar = $idkar;";
        } else if ($startdate != '' && $idkar == 0) {
            $sql .= "WHERE tg01.tgltg >= '$startdate' AND tg01.tgltg <= '$enddate';";
        } else if ($startdate == '' && $idkar != 0) {
            $sql .= "WHERE tg01.idkar = $idkar;";
        }
        $tg01 = DB::select(DB::raw($sql));
        return $tg01;
    }

    function getKehadiranGaji($date, $idkar) {
        $sql = "SELECT COUNT(*) as countHadir FROM ta02 WHERE mk01_id = $idkar AND MONTH(tglmsk) = " . date("n", strtotime($date)) . " AND abscd = 0;";
        $count = DB::select(DB::raw($sql));
        $count = $count[0];
        return $count->countHadir;
    }

    function getDurasiBekerjaGaji($date, $idkar) {
        $sql = "SELECT (SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.goHome, '%H:%i'), DATE_FORMAT(tabel_terluar.goWork, '%H:%i'))) as integer),0)) - 
                SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.breakIn, '%H:%i'), DATE_FORMAT(tabel_terluar.breakOut, '%H:%i'))) as integer),3600))) as durasiBekerja
                FROM ( 
                    SELECT DISTINCT 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 0 ) as goWork, 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 2 ) as breakOut, 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 3 ) as breakIn, 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 1 ) as goHome,
                        mk01_id
                    FROM ta02 as tabel_luar 
                        WHERE MONTH(tabel_luar.tglmsk) = " . date("n", strtotime($date)) . " AND YEAR(tabel_luar.tglmsk) = " . date("Y", strtotime($date)) . "
                    ) as tabel_terluar
                WHERE mk01_id = $idkar
                GROUP BY mk01_id;";
        $count = DB::select(DB::raw($sql));
        if (count($count) != 0) {
            $count = $count[0];
            $count = $count->durasiBekerja;
        } else {
            $count = 0;
        }
        return $count;
    }

    function getDurasiLemburGaji($date, $idkar) {
        $sql = "SELECT SUM(ifnull(CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(tabel_terluar.overWorkOut, '%H:%i'), DATE_FORMAT(tabel_terluar.overWorkIn, '%H:%i'))) as integer),0)) as jamlembur
                FROM ( 
                    SELECT DISTINCT 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 0 ) as goWork, 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 2 ) as breakOut, 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 3 ) as breakIn, 
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 1 ) as goHome,
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 4 ) as overWorkIn,
                        (SELECT tglmsk FROM ta02 WHERE DATE(tglmsk) = DATE(tabel_luar.tglmsk) AND mk01_id = tabel_luar.mk01_id AND abscd = 5 ) as overWorkOut,
                        mk01_id
                    FROM ta02 as tabel_luar 
                        WHERE MONTH(tabel_luar.tglmsk) = " . date("n", strtotime($date)) . " AND YEAR(tabel_luar.tglmsk) = " . date("Y", strtotime($date)) . "
                    ) as tabel_terluar
                WHERE mk01_id = $idkar
                GROUP BY mk01_id;";
//        echo $sql; exit;
        $count = DB::select(DB::raw($sql));
        if (count($count) != 0) {
            $count = $count[0];
            $count = $count->jamlembur;
        } else {
            $count = 0;
        }
        return $count;
    }

    function getKeterlambatan($date, $idkar) {
        $sql = "SELECT sum( CASE WHEN (CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(ta02.tglmsk, '%H:%i'), DATE_FORMAT(mj02.jmmsk, '%H:%i')))/60 as integer)) < 0 THEN 0 ELSE (CAST(TIME_TO_SEC(TIMEDIFF(DATE_FORMAT(ta02.tglmsk, '%H:%i'), DATE_FORMAT(mj02.jmmsk, '%H:%i')))/60 as integer)) END ) as lbt  FROM mk01
                RIGHT JOIN mj03 ON mj03.mk01_id = mk01.idkar
                RIGHT JOIN mj02 ON mj02.idjk = mj03.mj02_id
                RIGHT JOIN ta02 ON ta02.mk01_id = mk01.idkar
                WHERE MONTH(ta02.tglmsk) = " . date("n", strtotime($date)) . " AND YEAR(ta02.tglmsk) = " . date("Y", strtotime($date)) . " AND ta02.abscd = 0 AND mj02.tipe = 1 AND mk01.idkar = $idkar";
//        dd($sql);
        $count = DB::select(DB::raw($sql));
        if (count($count) != 0) {
            $count = $count[0]->lbt;
        } else {
            $count = 0;
        }
        return $count;
    }

    function checkExistHutangKaryawan($date, $idkar) {
        $th02 = DB::table('th02')
                ->join('th01', 'th01.idhut', '=', 'th02.idhut')
                ->select('th02.idph', 'th02.tglph')
                ->where('th01.idkar', '=', $idkar)
                ->where('th02.idtg', '=', 0)
                ->whereMonth('th02.tglph', '=', date("n", strtotime($date)))
                ->whereYear('th02.tglph', '=', date("Y", strtotime($date)))
                ->get();
        if (count($th02) > 0) {
            return $th02[0]->idph;
        } else {
            return -1;
        }
    }

    function checkExistTabunganKaryawan($date, $idkar) {
        $tt01 = DB::table('tt01')
                ->select('tt01.idtb', 'tt01.tgltb')
                ->where('tt01.idkar', '=', $idkar)
                ->where('tt01.idtg', '=', 0)
                ->whereMonth('tt01.tgltb', '=', date("n", strtotime($date)))
                ->whereYear('tt01.tgltb', '=', date("Y", strtotime($date)))
                ->get();
        if (count($tt01) > 0) {
            return $tt01[0]->idtb;
        } else {
            return -1;
        }
    }

    function updateHutangTabunganLunas($idph, $idtb) {
        if ($idph != -1) {
            $idhut = th02::find($idph)->idhut;
            $sql = "SELECT COUNT(idtg) as c_idtg
                    FROM th02 
                    WHERE idhut = $idhut AND idtg = 0;";

            $count = DB::select(DB::raw($sql));
            $flaglunas = $count[0]->c_idtg;

            if ($flaglunas == 0) {
                $th01 = th01::find($idhut);
                $th01->flglns = "Y";
                $th01->save();
            }
        }
    }

    function updateStatusGaji($idtg, $status) {
        $tg01 = tg01::find($idtg);
        $tg01->status = "Y";
        $tg01->save();
    }

}
