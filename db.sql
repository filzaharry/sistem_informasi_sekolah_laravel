-- -------------------------------------------------------------
-- TablePlus 5.0.0(454)
--
-- https://tableplus.com/
--
-- Database: eo
-- Generation Time: 2022-11-13 20:54:46.2830
-- -------------------------------------------------------------


-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS akses_id_seq;

-- Table Definition
CREATE TABLE "public"."akses" (
    "id" int8 NOT NULL DEFAULT nextval('akses_id_seq'::regclass),
    "level_user_id" int8 NOT NULL,
    "menu_id" int8 NOT NULL,
    "akses" int4 NOT NULL DEFAULT 0,
    "tambah" int4 NOT NULL DEFAULT 0,
    "edit" int4 NOT NULL DEFAULT 0,
    "hapus" int4 NOT NULL DEFAULT 0,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-08-29 11:24:28.723641'::timestamp without time zone,
    "export" int4 NOT NULL DEFAULT 0,
    "detail" int4 NOT NULL DEFAULT 0,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS bank_id_seq;

-- Table Definition
CREATE TABLE "public"."bank" (
    "id" int8 NOT NULL DEFAULT nextval('bank_id_seq'::regclass),
    "name" varchar(255) NOT NULL,
    "va" varchar(255) NOT NULL,
    "an" varchar(255) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-11-05 05:45:33.995477'::timestamp without time zone,
    "event_id" int4,
    PRIMARY KEY ("id")
);

-- Column Comment
COMMENT ON COLUMN "public"."bank"."va" IS 'virtual account';
COMMENT ON COLUMN "public"."bank"."an" IS 'atas nama';

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS entries_id_seq;

-- Table Definition
CREATE TABLE "public"."entries" (
    "id" int8 NOT NULL DEFAULT nextval('entries_id_seq'::regclass),
    "name" varchar(255) NOT NULL,
    "email" varchar(255) NOT NULL,
    "picture" varchar(11),
    "phone" varchar(20) NOT NULL,
    "city" varchar(50) NOT NULL,
    "gender" varchar(5) NOT NULL,
    "session_off" timestamp(0) NOT NULL DEFAULT '2022-11-04 20:29:14'::timestamp without time zone,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-11-05 05:29:14.07915'::timestamp without time zone,
    "ticket_id" int4 NOT NULL,
    "bank_id" int4 NOT NULL,
    "status" int4 NOT NULL DEFAULT 0,
    "event_id" int4 NOT NULL,
    "generate_qr" varchar(255),
    "is_ots" int4 NOT NULL DEFAULT 0,
    PRIMARY KEY ("id")
);

-- Column Comment
COMMENT ON COLUMN "public"."entries"."bank_id" IS 'jika ots, maka menggunakan bank default';
COMMENT ON COLUMN "public"."entries"."status" IS '0 = submit blm bayar ; 1 = submit sudah bayar ; 2 = sudah approve admin ; 3 = di reject admin ; 4 = auto reject karna waktu habis namun belum bayar';
COMMENT ON COLUMN "public"."entries"."generate_qr" IS 'kalo belom bayar, qr code blm keluar';
COMMENT ON COLUMN "public"."entries"."is_ots" IS '0 = online ; 1 = offline';

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS event_id_seq;

-- Table Definition
CREATE TABLE "public"."event" (
    "id" int8 NOT NULL DEFAULT nextval('event_id_seq'::regclass),
    "name" varchar(255) NOT NULL,
    "desc" text NOT NULL,
    "start" timestamp(0) NOT NULL,
    "end" timestamp(0) NOT NULL,
    "address" varchar(255) NOT NULL,
    "is_online" varchar(3) NOT NULL DEFAULT '0'::character varying,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-11-05 05:55:11.245135'::timestamp without time zone,
    "kuota" varchar(11) NOT NULL,
    "picture" varchar(255),
    "email" varchar(255),
    "phone" varchar(255),
    "client" varchar(255),
    "company" varchar(255),
    "status" varchar(3),
    "status_ticket" varchar(3),
    PRIMARY KEY ("id")
);

-- Column Comment
COMMENT ON COLUMN "public"."event"."is_online" IS '0 = online ; 1 offline';
COMMENT ON COLUMN "public"."event"."status" IS '0 = belum dimulai ; 1 = acara dimulai ; 2 = acara selesai ; 3 = acara di batalkan';
COMMENT ON COLUMN "public"."event"."status_ticket" IS '1 = tiket tersedia ; 2 = tiket tidak tersedia';

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS failed_jobs_id_seq;

-- Table Definition
CREATE TABLE "public"."failed_jobs" (
    "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
    "uuid" varchar(255) NOT NULL,
    "connection" text NOT NULL,
    "queue" text NOT NULL,
    "payload" text NOT NULL,
    "exception" text NOT NULL,
    "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS gen_param_id_seq;

-- Table Definition
CREATE TABLE "public"."gen_param" (
    "id" int8 NOT NULL DEFAULT nextval('gen_param_id_seq'::regclass),
    "param" varchar(255) NOT NULL,
    "value" varchar(255) NOT NULL,
    "type" varchar(255) NOT NULL,
    "status" varchar(2) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-09-08 14:00:10.530093'::timestamp without time zone,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS icons_id_seq;

-- Table Definition
CREATE TABLE "public"."icons" (
    "id" int8 NOT NULL DEFAULT nextval('icons_id_seq'::regclass),
    "name" varchar(255) NOT NULL,
    "status" varchar(255) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-09-08 16:23:40.754053'::timestamp without time zone,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS import_id_seq;

-- Table Definition
CREATE TABLE "public"."import" (
    "id" int8 NOT NULL DEFAULT nextval('import_id_seq'::regclass),
    "filename" varchar(50) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-08-29 11:24:50.104188'::timestamp without time zone,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Table Definition
CREATE TABLE "public"."job_batches" (
    "id" varchar(255) NOT NULL,
    "name" varchar(255) NOT NULL,
    "total_jobs" int4 NOT NULL,
    "pending_jobs" int4 NOT NULL,
    "failed_jobs" int4 NOT NULL,
    "failed_job_ids" text NOT NULL,
    "options" text,
    "cancelled_at" int4,
    "created_at" int4 NOT NULL,
    "finished_at" int4,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS jobs_id_seq;

-- Table Definition
CREATE TABLE "public"."jobs" (
    "id" int8 NOT NULL DEFAULT nextval('jobs_id_seq'::regclass),
    "queue" varchar(255) NOT NULL,
    "payload" text NOT NULL,
    "attempts" int2 NOT NULL,
    "reserved_at" int4,
    "available_at" int4 NOT NULL,
    "created_at" int4 NOT NULL,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS landingpage_id_seq;

-- Table Definition
CREATE TABLE "public"."landingpage" (
    "id" int8 NOT NULL DEFAULT nextval('landingpage_id_seq'::regclass),
    "title" varchar(255) NOT NULL,
    "subtitle" varchar(255) NOT NULL,
    "picture_h" varchar(255) NOT NULL,
    "form" varchar(255),
    "event_id" varchar(11) NOT NULL,
    "user_id" varchar(11),
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-11-05 05:52:14.798655'::timestamp without time zone,
    "domain" varchar(255),
    "subtitle_as" varchar(255),
    "picture_as" varchar(255),
    "picture_f" varchar(255),
    PRIMARY KEY ("id")
);

-- Column Comment
COMMENT ON COLUMN "public"."landingpage"."picture_h" IS 'picture header 3 item ,12 x 12';
COMMENT ON COLUMN "public"."landingpage"."domain" IS 'after submit';
COMMENT ON COLUMN "public"."landingpage"."subtitle_as" IS 'after submit';
COMMENT ON COLUMN "public"."landingpage"."picture_as" IS 'after submit';
COMMENT ON COLUMN "public"."landingpage"."picture_f" IS 'picture form 1 item, 12 x 12';

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS level_users_id_seq;

-- Table Definition
CREATE TABLE "public"."level_users" (
    "id" int8 NOT NULL DEFAULT nextval('level_users_id_seq'::regclass),
    "nama_level_user" bpchar(20) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-08-29 11:18:41.067816'::timestamp without time zone,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS menu_id_seq;

-- Table Definition
CREATE TABLE "public"."menu" (
    "id" int8 NOT NULL DEFAULT nextval('menu_id_seq'::regclass),
    "nama_menu" bpchar(50) NOT NULL,
    "level_menu" varchar(255) NOT NULL DEFAULT 'sub_menu'::character varying CHECK ((level_menu)::text = ANY (ARRAY[('main_menu'::character varying)::text, ('sub_menu'::character varying)::text])),
    "master_menu" int4 NOT NULL,
    "url" varchar(250),
    "icon" bpchar(50),
    "aktif" varchar(255) NOT NULL DEFAULT 'Y'::character varying CHECK ((aktif)::text = ANY (ARRAY[('Y'::character varying)::text, ('N'::character varying)::text])),
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-08-29 11:18:12.908131'::timestamp without time zone,
    "sort" int4,
    "is_parent" int4,
    "sort_sub" int4,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS migrations_id_seq;

-- Table Definition
CREATE TABLE "public"."migrations" (
    "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
    "migration" varchar(255) NOT NULL,
    "batch" int4 NOT NULL,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Table Definition
CREATE TABLE "public"."password_resets" (
    "email" varchar(255) NOT NULL,
    "token" varchar(255) NOT NULL,
    "created_at" timestamp(0)
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS personal_access_tokens_id_seq;

-- Table Definition
CREATE TABLE "public"."personal_access_tokens" (
    "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
    "tokenable_type" varchar(255) NOT NULL,
    "tokenable_id" int8 NOT NULL,
    "name" varchar(255) NOT NULL,
    "token" varchar(64) NOT NULL,
    "abilities" text,
    "last_used_at" timestamp(0),
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-08-29 11:18:41.056936'::timestamp without time zone,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS sponsorship_id_seq;

-- Table Definition
CREATE TABLE "public"."sponsorship" (
    "id" int8 NOT NULL DEFAULT nextval('sponsorship_id_seq'::regclass),
    "name" varchar(100) NOT NULL,
    "picture" varchar(255) NOT NULL,
    "address" varchar(255) NOT NULL,
    "contact" varchar(100) NOT NULL,
    "contact_phone" varchar(20) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-11-05 05:58:07.530799'::timestamp without time zone,
    "nominal" varchar(100) NOT NULL,
    "event_id" int4,
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS ticket_id_seq;

-- Table Definition
CREATE TABLE "public"."ticket" (
    "id" int8 NOT NULL DEFAULT nextval('ticket_id_seq'::regclass),
    "name" varchar(100) NOT NULL,
    "event_id" varchar(11) NOT NULL,
    "price" varchar(20) NOT NULL,
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-11-05 05:48:52.233218'::timestamp without time zone,
    "kuota" varchar(20),
    PRIMARY KEY ("id")
);

-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS users_id_seq;

-- Table Definition
CREATE TABLE "public"."users" (
    "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
    "name" varchar(255) NOT NULL,
    "username" varchar(255) NOT NULL,
    "email" varchar(255) NOT NULL,
    "email_verified_at" timestamp(0),
    "password" varchar(255) NOT NULL,
    "remember_token" varchar(100),
    "created_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" timestamp(0) NOT NULL DEFAULT '2022-08-29 11:18:41.0324'::timestamp without time zone,
    "level_user_id" int8 NOT NULL DEFAULT '1'::bigint,
    PRIMARY KEY ("id")
);

INSERT INTO "public"."akses" ("id", "level_user_id", "menu_id", "akses", "tambah", "edit", "hapus", "created_at", "updated_at", "export", "detail") VALUES
(7, 1, 2, 1, 1, 1, 1, '2022-08-29 11:31:17', '2022-08-29 11:24:29', 1, 1),
(8, 1, 10, 1, 1, 1, 1, '2022-11-05 09:12:18', '2022-11-05 09:16:50', 1, 0),
(9, 1, 4, 1, 1, 1, 1, '2022-08-29 11:31:17', '2022-08-29 11:24:29', 1, 1),
(11, 1, 6, 1, 1, 1, 1, '2022-08-29 11:31:17', '2022-08-29 11:24:29', 1, 1),
(12, 1, 7, 1, 1, 1, 1, '2022-08-29 11:31:17', '2022-08-29 11:24:29', 1, 1),
(13, 1, 8, 1, 1, 1, 1, '2022-08-29 11:31:17', '2022-08-29 11:24:29', 1, 1),
(14, 1, 9, 1, 1, 1, 1, '2022-08-29 11:31:17', '2022-09-05 04:44:57', 1, 1),
(19, 1, 16, 0, 0, 0, 0, '2022-11-05 09:14:26', '2022-11-05 09:14:26', 0, 0),
(20, 9, 16, 0, 0, 0, 0, '2022-11-05 09:14:26', '2022-11-05 09:14:26', 0, 0),
(21, 10, 16, 0, 0, 0, 0, '2022-11-05 09:14:26', '2022-11-05 09:14:26', 0, 0),
(22, 11, 16, 0, 0, 0, 0, '2022-11-05 09:14:26', '2022-11-05 09:14:26', 0, 0),
(23, 1, 17, 1, 1, 1, 1, '2022-11-05 12:27:25', '2022-11-05 12:28:23', 1, 0),
(24, 9, 17, 0, 0, 0, 0, '2022-11-05 12:27:25', '2022-11-05 12:27:25', 0, 0),
(25, 10, 17, 0, 0, 0, 0, '2022-11-05 12:27:25', '2022-11-05 12:27:25', 0, 0),
(26, 11, 17, 0, 0, 0, 0, '2022-11-05 12:27:25', '2022-11-05 12:27:25', 0, 0),
(76, 9, 4, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(77, 9, 7, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(79, 9, 8, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(80, 9, 6, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(81, 9, 3, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(82, 9, 9, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(83, 9, 2, 1, 1, 1, 1, '2022-09-09 08:11:21', '2022-09-09 09:10:19', 1, 1),
(84, 1, 114, 1, 1, 1, 1, '2022-09-12 04:24:53', '2022-09-12 04:25:03', 1, 0),
(85, 9, 114, 0, 0, 0, 0, '2022-09-12 04:24:53', '2022-09-12 04:24:53', 0, 0),
(96, 1, 120, 0, 0, 0, 0, '2022-09-30 07:31:44', '2022-09-30 07:31:44', 0, 0),
(97, 9, 120, 0, 0, 0, 0, '2022-09-30 07:31:44', '2022-09-30 07:31:44', 0, 0),
(100, 10, 114, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(101, 10, 9, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(102, 10, 8, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(103, 10, 4, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(104, 10, 7, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(105, 10, 120, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(106, 10, 3, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(107, 10, 6, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(108, 10, 2, 0, 0, 0, 0, '2022-11-02 17:13:17', '2022-11-02 17:13:17', 0, 0),
(110, 11, 114, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(111, 11, 9, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(112, 11, 8, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(113, 11, 4, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(114, 11, 7, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(115, 11, 120, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(116, 11, 3, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(117, 11, 6, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(118, 11, 2, 0, 0, 0, 0, '2022-11-02 17:13:26', '2022-11-02 17:13:26', 0, 0),
(120, 1, 122, 1, 1, 1, 1, '2022-11-02 17:28:48', '2022-11-02 17:28:56', 1, 0),
(121, 9, 122, 0, 0, 0, 0, '2022-11-02 17:28:48', '2022-11-02 17:28:48', 0, 0),
(122, 10, 122, 0, 0, 0, 0, '2022-11-02 17:28:48', '2022-11-02 17:28:48', 0, 0),
(123, 11, 122, 0, 0, 0, 0, '2022-11-02 17:28:48', '2022-11-02 17:28:48', 0, 0),
(124, 1, 124, 1, 1, 1, 1, '2022-11-02 17:28:48', '2022-11-02 17:28:56', 1, 1),
(125, 9, 124, 1, 1, 1, 1, '2022-11-02 17:28:48', '2022-11-02 17:28:48', 1, 1),
(126, 10, 124, 1, 1, 1, 1, '2022-11-02 17:28:48', '2022-11-02 17:28:48', 1, 1),
(127, 11, 124, 1, 1, 1, 1, '2022-11-02 17:28:48', '2022-11-02 17:28:48', 1, 1);

INSERT INTO "public"."bank" ("id", "name", "va", "an", "created_at", "updated_at", "event_id") VALUES
(1, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(2, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(3, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(4, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(5, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(6, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(7, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(8, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(9, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(10, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(11, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(12, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1),
(13, 'BNI', '123123123', 'Filza Harry Prayogo', '2022-11-05 16:05:55', '2022-11-05 05:45:34', 1);

INSERT INTO "public"."entries" ("id", "name", "email", "picture", "phone", "city", "gender", "session_off", "created_at", "updated_at", "ticket_id", "bank_id", "status", "event_id", "generate_qr", "is_ots") VALUES
(2, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(3, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(4, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(5, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(6, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(7, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(8, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(9, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(10, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(11, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(12, 'Kamen Rider', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(13, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(14, 'Ryuki', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(15, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(16, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(17, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(18, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(19, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(20, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(21, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(22, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(23, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(24, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(25, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(26, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(27, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(28, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(29, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(30, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(31, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(32, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(33, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(34, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(35, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(36, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(37, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(38, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(39, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(40, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(41, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(42, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(43, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(44, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(45, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(46, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(47, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(48, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(49, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(50, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(51, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(52, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(53, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(54, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(55, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(56, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(57, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(58, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(59, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(60, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(61, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(62, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(63, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(64, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(65, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(66, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(67, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(68, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0),
(69, 'Filza', 'harryfilza@gmail.com', 'brave.jpg', '0895636701586', 'tangerang', 'M', '2022-11-04 20:29:14', '2022-11-05 08:22:47', '2022-11-05 05:29:14', 1, 1, 1, 1, NULL, 0);

INSERT INTO "public"."event" ("id", "name", "desc", "start", "end", "address", "is_online", "created_at", "updated_at", "kuota", "picture", "email", "phone", "client", "company", "status", "status_ticket") VALUES
(1, 'Konser Meraih Mimpi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-11-05 18:33:11', '2022-11-07 18:33:11', 'Gelora Bung Karno Jakarta Pusat', '0', '2022-11-05 18:34:07', '2022-11-05 05:55:11', '3000', NULL, 'harryfilza@missi.idea.com', '0895636701586', 'Filza Harry', 'PT. Missi Idea Selaras', '1', '1');

INSERT INTO "public"."gen_param" ("id", "param", "value", "type", "status", "created_at", "updated_at") VALUES
(2, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(3, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(4, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(5, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(6, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(7, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(8, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(9, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(10, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(11, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(12, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(13, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(14, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(15, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(16, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(17, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(18, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(19, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(20, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(21, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(22, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(23, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(24, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(25, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(26, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(27, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(28, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(29, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(30, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(31, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(32, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(33, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(34, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11'),
(35, 'urlFirst', 'http://www.test.com', '1', '1', '2022-09-08 14:05:22', '2022-09-08 14:00:11');

INSERT INTO "public"."icons" ("id", "name", "status", "created_at", "updated_at") VALUES
(1, 'fa fa-user', '1', '2022-09-08 16:23:54', '2022-09-08 16:23:41'),
(2, 'fas fa-snowflake                                  ', '1', '2022-09-09 13:57:03', '2022-09-08 16:23:41'),
(4, 'fas fa-temperature-low', '1', '2022-09-12 11:43:40', '2022-09-08 16:23:41');

INSERT INTO "public"."landingpage" ("id", "title", "subtitle", "picture_h", "form", "event_id", "user_id", "created_at", "updated_at", "domain", "subtitle_as", "picture_as", "picture_f") VALUES
(1, 'GEBYAR', 'lorem ipsum dolor sit amet', '123', '123;123123', '1', NULL, '2022-11-07 00:16:10', '2022-11-05 05:52:15', 'www.meraihmimpi.com', NULL, NULL, NULL),
(2, 'GEBYAR', 'lorem ipsum dolor sit amet', '123', '123;123123', '1', NULL, '2022-11-07 00:16:10', '2022-11-05 05:52:15', 'www.meraihmimpi.com', NULL, NULL, NULL),
(3, 'GEBYAR', 'lorem ipsum dolor sit amet', '123', '123;123123', '1', NULL, '2022-11-07 00:16:10', '2022-11-05 05:52:15', 'www.meraihmimpi.com', NULL, NULL, NULL);

INSERT INTO "public"."level_users" ("id", "nama_level_user", "created_at", "updated_at") VALUES
(1, 'admin               ', '2022-08-29 11:30:00', '2022-08-29 11:18:41'),
(9, 'supervisor          ', '2022-09-09 15:11:21', '2022-08-29 11:18:41'),
(10, 'operator            ', '2022-11-03 00:13:18', '2022-08-29 11:18:41'),
(11, 'user                ', '2022-11-03 00:13:26', '2022-08-29 11:18:41');

INSERT INTO "public"."menu" ("id", "nama_menu", "level_menu", "master_menu", "url", "icon", "aktif", "created_at", "updated_at", "sort", "is_parent", "sort_sub") VALUES
(2, 'Menu List                                         ', 'sub_menu', 4, 'daftar-menu', 'icon-grid                                         ', 'Y', '2022-08-29 11:31:08', '2022-08-29 11:18:13', 8, 0, 2),
(3, 'Menu Access                                       ', 'sub_menu', 4, 'menuaccess', 'icon-user                                         ', 'Y', '2022-08-29 11:31:08', '2022-08-29 11:18:13', 4, 0, 3),
(4, 'Konfigurasi                                       ', 'main_menu', 0, '', 'icon-user                                         ', 'Y', '2022-08-29 11:31:08', '2022-08-29 11:18:13', 2, 1, 4),
(6, 'Home                                              ', 'sub_menu', 124, 'dashboard', 'icon-home                                         ', 'Y', '2022-08-29 11:37:22', '2022-08-29 11:18:13', 3, 1, 1),
(7, 'Users                                             ', 'sub_menu', 4, 'users', 'icon-user                                         ', 'Y', '2022-08-29 11:31:08', '2022-08-29 11:18:13', 6, 0, 3),
(8, 'User Level                                        ', 'sub_menu', 4, 'user-level', 'icon-user                                         ', 'Y', '2022-08-29 11:31:08', '2022-08-29 11:18:13', 7, 0, 3),
(9, 'General Parameter                                 ', 'sub_menu', 4, 'genparams', 'icon-user                                         ', 'Y', '2022-08-30 11:25:17', '2022-08-29 11:18:13', 9, 0, 1),
(10, 'Events                                            ', 'sub_menu', 124, 'events', ' icon-pin                                         ', 'Y', '2022-11-05 16:12:19', '2022-08-29 11:18:13', 5, NULL, NULL),
(12, 'Sponsorship                                       ', 'sub_menu', 124, 'sponsorship', ' icon-note                                        ', 'Y', '2022-11-05 16:12:48', '2022-08-29 11:18:13', 11, NULL, NULL),
(16, 'Tickets                                           ', 'sub_menu', 124, 'tickets', 'icon-layers                                       ', 'Y', '2022-11-05 16:14:26', '2022-08-29 11:18:13', 5, NULL, NULL),
(17, 'Landing Page                                      ', 'sub_menu', 124, 'landingpage', 'icon-rocket                                       ', 'Y', '2022-11-05 19:27:25', '2022-11-05 12:27:35', 6, NULL, NULL),
(114, 'Icons                                             ', 'sub_menu', 4, 'icons', 'icon-user                                         ', 'Y', '2022-09-12 11:24:53', '2022-08-29 11:18:13', 11, 0, 1),
(120, 'Logout                                            ', 'main_menu', 0, 'logout', 'icon-user                                         ', 'Y', '2022-09-30 14:31:45', '2022-08-29 11:18:13', 10, 0, 1),
(122, 'Entries                                           ', 'sub_menu', 124, 'entries', 'icon-list                                         ', 'Y', '2022-11-03 00:28:48', '2022-08-29 11:18:13', 5, 0, 6),
(124, 'Dashboard                                         ', 'main_menu', 0, '', 'icon-user                                         ', 'Y', '2022-08-29 11:31:08', '2022-08-29 11:18:13', 1, 1, 4);

INSERT INTO "public"."migrations" ("id", "migration", "batch") VALUES
(1, '2022_11_04_221558_entries_table', 8),
(2, '2022_11_04_224214_bank_table', 9),
(3, '2022_11_04_224228_ticket_table', 10),
(4, '2022_11_04_224432_landingpage_table', 11),
(5, '2022_11_04_224900_event_table', 12),
(6, '2022_11_04_225519_sponsorship_table', 13),
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2021_10_23_025908_create_level_users_table', 1),
(28, '2021_10_23_030744_add_level_user_to_users_table', 2),
(29, '2021_10_23_031201_create_akses_table', 2),
(30, '2022_05_12_152450_create_icon_table', 2),
(31, '2022_05_13_180035_create_import_table', 3),
(32, '2022_05_13_194830_create_jobs_table', 3),
(33, '2022_05_13_194914_create_job_batches_table', 3),
(34, '2022_05_14_103055_create_reject_reason_table', 3),
(35, '2022_05_14_190727_create_import_entries_table', 3),
(36, '2022_06_06_034840_import_category_table', 3),
(37, '2022_06_06_070513_import_entries_hardprize_table', 3),
(38, '2022_06_07_035839_entries_hardprize_table', 3),
(39, '2022_06_07_054737_failed_import_table', 3),
(40, '2022_06_07_103035_prize_list_table', 3),
(41, '2022_06_08_165039_coverages_area_table', 3),
(42, '2022_06_16_135243_header_entries_hardprize_table', 4),
(43, '2022_06_20_182743_create_master_barang_table', 5),
(44, '2022_06_27_082228_failed_approve_table', 5),
(45, '2022_06_29_073002_create_pick_up_table', 5),
(46, '2022_06_30_023711_create_count_approve_table', 5),
(47, '2022_06_30_070001_create_sap_pickup_table', 5),
(50, '2022_09_08_063545_create_table_general_param', 6),
(51, '2022_09_08_091952_create_icons_table', 7);

INSERT INTO "public"."sponsorship" ("id", "name", "picture", "address", "contact", "contact_phone", "created_at", "updated_at", "nominal", "event_id") VALUES
(1, 'Nestle', 'asd', 'Jakarta', 'filza', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '10000000', 1),
(2, 'Biskuat', 'asd', 'Bandung', 'brave', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(3, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(4, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(5, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(6, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(7, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(8, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(9, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(10, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(11, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(12, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(13, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(14, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(15, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1),
(16, 'Energen', 'asd', 'Tangerang', 'dragon', 'asd', '2022-11-06 00:30:31', '2022-11-05 05:58:08', '1500000', 1);

INSERT INTO "public"."ticket" ("id", "name", "event_id", "price", "created_at", "updated_at", "kuota") VALUES
(1, 'VIP', '1', '700000', '2022-11-06 23:31:10', '2022-11-05 05:48:52', '500'),
(2, 'VVIP', '1', '1200000', '2022-11-06 23:31:24', '2022-11-05 05:48:52', '200');

INSERT INTO "public"."users" ("id", "name", "username", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at", "level_user_id") VALUES
(3, 'Abdul', 'abdul', '123@test.com', NULL, '$2y$10$0qoOuTCUOntOD/5GlQu3LOQBz7cfx23ycfPgcVXnBMyAq59Z5XDry', 'BO2aYd7o1LVhyOWeMTOby3Pl5yqyZIZHTUGN4GoMGRabl2MTHwrPeWEkbjS4', '2022-08-29 11:30:06', '2022-08-29 11:18:41', 1),
(4, 'Budi', 'budi', 'bud123@test.com', NULL, '$2y$10$2ht8Guii3i45Vx7OxHiPdeznY9ry.AxkhQ5nUs0kCE9.vehNyygGO', 'WvfJFDy1dIQZ3wvWpCZiwlajplASy5Cz8WkmxSOB', '2022-08-29 11:30:06', '2022-08-29 11:18:41', 1),
(17, 'Filza Harry', 'ryuki', 'ryuki@test.com', NULL, '$2y$10$oy/em7iSOZHc6E3K.cX3CuXZL3HXNwG46UyX8HgHNeuU.5Q6JsIFq', 'SKu5IoqrS756SiPNTjgE4rVmtECQ6PSTcpP6yqg4NsfYPsTYaRsvSDIjHuF8', '2022-09-03 09:43:43', '2022-09-03 09:43:43', 1),
(18, 'brave', 'geats', 'brave@gmail.com', NULL, '$2y$10$/0g0x.MPFacClsDRqMPw6elIVegCZMArndDpSEmpaKwu1woQBzqUa', 'ZDrqESfLg3HDJBKwsAQx4y123KiOh3H2KNPZtvB0', '2022-09-04 20:59:44', '2022-09-04 22:44:02', 1);

ALTER TABLE "public"."akses" ADD FOREIGN KEY ("level_user_id") REFERENCES "public"."level_users"("id");
ALTER TABLE "public"."akses" ADD FOREIGN KEY ("menu_id") REFERENCES "public"."menu"("id");
ALTER TABLE "public"."users" ADD FOREIGN KEY ("level_user_id") REFERENCES "public"."level_users"("id");
