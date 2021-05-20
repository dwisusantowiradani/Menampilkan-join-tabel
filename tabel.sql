/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     5/18/2021 2:23:38 PM                         */
/*==============================================================*/


drop table if exists PAKET_KECEPATAN;

drop table if exists PELANGGAN;

drop table if exists TRANSAKSI;

/*==============================================================*/
/* Table: PAKET_KECEPATAN                                       */
/*==============================================================*/
create table PAKET_KECEPATAN
(
   ID_PAKET             char(3) not null,
   KECEPATAN_MBPS       int,
   HARGA_KECEPATAN_MBPS numeric(8,0),
   TGL_UPDATE           date,
   USER_UPDATE          char(15),
   primary key (ID_PAKET)
);

/*==============================================================*/
/* Table: PELANGGAN                                             */
/*==============================================================*/
create table PELANGGAN
(
   ID_PELANGGAN         char(5) not null,
   NAMA_PELANGGAN       char(30),
   ALAMAT_PELANGGAN     char(50),
   KECEPATAN_PELANGGAN  char(2),
   TGL_ANGGOTA_PELANGGAN date,
   STATUS				char(10),
   primary key (ID_PELANGGAN)
);

/*==============================================================*/
/* Table: TRANSAKSI                                             */
/*==============================================================*/
create table TRANSAKSI
(
   ID_TRANSAKSI         char(6) not null,
   ID_PAKET             char(3),
   ID_PELANGGAN         char(5),
   TGL_TRANSAKSI        date,
   KET                  char(50),
   NOMINAL				char(15),
   primary key (ID_TRANSAKSI)
);

alter table TRANSAKSI add constraint FK_MELAKUKAN foreign key (ID_PELANGGAN)
      references PELANGGAN (ID_PELANGGAN) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_TERJADI foreign key (ID_PAKET)
      references PAKET_KECEPATAN (ID_PAKET) on delete restrict on update restrict;

