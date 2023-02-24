# 4a
-- SELECT * FROM baiviet  WHERE ma_tloai = (SELECT ma_tloai FROM theloai WHERE ten_tloai = 'Nhạc trữ tình');

# 4b
-- SELECT * FROM baiviet  WHERE ma_tgia = (SELECT ma_tgia FROM tacgia WHERE ten_tgia = 'Nhacvietplus');

# 4c
-- SELECT * FROM theloai  WHERE ma_tloai not in (SELECT ma_tloai FROM baiviet);

# 4d
-- SELECT ma_bviet as 'mã bài viết', tieude as 'tên bài viết', ten_bhat as 'tên bài hát', ten_tgia as 'tên tác giả', ten_tloai as 'tên thể loại', ngayviet as 'ngày viết' from baiviet, tacgia, theloai where baiviet.ma_tgia=tacgia.ma_tgia and baiviet.ma_tloai = theloai.ma_tloai;

# 4e
-- SELECT * from theloai WHERE ma_tloai in (SELECT ma_tloai FROM (SELECT COUNT(ma_tloai) as Amount, ma_tloai from  baiviet GROUP BY ma_tloai) as count WHERE Amount = (SELECT Max(Amount) FROM (SELECT COUNT(ma_tloai) as Amount from  baiviet GROUP BY ma_tloai) as count));

# 4f
-- SELECT * from tacgia WHERE ma_tgia in (SELECT ma_tgia FROM (SELECT COUNT(ma_tgia) as Amount, ma_tgia from  baiviet GROUP BY ma_tgia) as count WHERE Amount = (SELECT Max(Amount) FROM (SELECT COUNT(ma_tgia) as Amount from  baiviet GROUP BY ma_tgia) as count)) LIMIT 2;

# 4g
-- SELECT * FROM baiviet WHERE ten_bhat REGEXP 'yêu|thương|anh|em';

# 4h
-- SELECT * FROM baiviet WHERE ten_bhat REGEXP 'yêu|thương|anh|em' or tieude REGEXP 'yêu|thương|anh|em';

# 4i
-- CREATE VIEW vw_Music AS (SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, tl.ten_tloai, bv.tomtat, bv.noidung, tg.ten_tgia, bv.ngayviet, bv.hinhanh FROM baiviet bv LEFT JOIN tacgia tg ON bv.ma_tgia = tg.ma_tgia LEFT JOIN theloai tl ON bv.ma_tloai = tl.ma_tloai);

# 4j
-- DELIMITER $$ CREATE PROCEDURE `sp_DSBaiViet` (IN `TenTheLoai` VARCHAR(100)) BEGIN IF NOT EXISTS (SELECT ma_tloai FROM theloai WHERE ten_tloai = TenTheLoai) THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Không tồn tại thể loại này'; END IF; SELECT * FROM baiviet WHERE ma_tloai = (SELECT ma_tloai FROM theloai WHERE ten_tloai = TenTheLoai); END$$ DELIMITER;

# 4k
-- ALTER TABLE theloai ADD SLBaiViet INT UNSIGNED NOT NULL DEFAULT 0 AFTER ten_tloai;

--Trigger khi thêm mới bài viết
-- DROP TRIGGER IF EXISTS `tg_CapNhatTheLoai_ThemBaiViet`; DELIMITER $$ CREATE TRIGGER `tg_CapNhatTheLoai_ThemBaiViet` AFTER INSERT ON `baiviet` FOR EACH ROW BEGIN UPDATE theloai SET SLBaiViet = SLBaiViet + 1 WHERE theloai.ma_tloai = NEW.ma_tloai; END $$ DELIMITER;

--Trigger khi sửa bài viết
-- DROP TRIGGER IF EXISTS `tg_CapNhatTheLoai_SuaBaiViet`; DELIMITER $$ CREATE TRIGGER `tg_CapNhatTheLoai_SuaBaiViet` AFTER UPDATE ON `baiviet` FOR EACH ROW BEGIN IF NEW.ma_tloai != OLD.ma_tloai THEN  UPDATE theloai SET SLBaiViet = SLBaiViet + 1 WHERE ma_tloai = NEW.ma_tloai; UPDATE theloai SET SLBaiViet = SLBaiViet - 1 WHERE ma_tloai = OLD.ma_tloai; END IF; END $$ DELIMITER;

-- Trigger khi 
-- DROP TRIGGER IF EXISTS `tg_CapNhatTheLoai_XoaBaiViet`; DELIMITER $$ CREATE TRIGGER `tg_CapNhatTheLoai_XoaBaiViet` AFTER DELETE ON `baiviet` FOR EACH ROW BEGIN  UPDATE theloai SET SLBaiViet = SLBaiViet - 1 WHERE ma_tloai = OLD.ma_tloai; END $$ DELIMITER;


# 4i
-- CREATE TABLE `users` (`id` INT UNSIGNED NOT NULL PRIMARY KEY, `username` varchar(50) NOT NULL, `password` varchar(50) NOT NULL)
-- INSERT INTO `users` (`id`, `username`, `password`) VALUES ('1', 'admin', 'admin')
