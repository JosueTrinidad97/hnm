USE [master]
GO
/****** Object:  Database [EventosPrueba]    Script Date: 8/24/2020 3:32:16 PM ******/
CREATE DATABASE [EventosPrueba]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'EventosPrueba', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\EventosPrueba.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'EventosPrueba_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\EventosPrueba_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [EventosPrueba] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [EventosPrueba].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [EventosPrueba] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [EventosPrueba] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [EventosPrueba] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [EventosPrueba] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [EventosPrueba] SET ARITHABORT OFF 
GO
ALTER DATABASE [EventosPrueba] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [EventosPrueba] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [EventosPrueba] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [EventosPrueba] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [EventosPrueba] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [EventosPrueba] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [EventosPrueba] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [EventosPrueba] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [EventosPrueba] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [EventosPrueba] SET  ENABLE_BROKER 
GO
ALTER DATABASE [EventosPrueba] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [EventosPrueba] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [EventosPrueba] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [EventosPrueba] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [EventosPrueba] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [EventosPrueba] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [EventosPrueba] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [EventosPrueba] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [EventosPrueba] SET  MULTI_USER 
GO
ALTER DATABASE [EventosPrueba] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [EventosPrueba] SET DB_CHAINING OFF 
GO
ALTER DATABASE [EventosPrueba] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [EventosPrueba] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [EventosPrueba] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [EventosPrueba] SET QUERY_STORE = OFF
GO
USE [EventosPrueba]
GO
/****** Object:  Table [dbo].[Asistentes]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Asistentes](
	[idAsistente] [varchar](30) NOT NULL,
	[nombre] [varchar](50) NULL,
	[correo] [varchar](30) NULL,
	[telefono] [varchar](15) NULL,
	[gradoEstudios] [varchar](50) NULL,
	[idCosto] [varchar](20) NULL,
	[idEventos] [varchar](50) NULL,
	[Estado] [char](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[idAsistente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[costo]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[costo](
	[idCosto] [varchar](20) NOT NULL,
	[idEventos] [varchar](50) NULL,
	[TipoAsistente] [varchar](20) NULL,
	[precio] [varchar](20) NULL,
	[estado] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[idCosto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[documentos]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[documentos](
	[tipo] [varchar](20) NOT NULL,
	[titulo] [varchar](50) NULL,
	[sujeto] [varchar](20) NULL,
	[descripcion] [text] NULL,
	[frase] [text] NULL,
	[firmas] [text] NULL,
PRIMARY KEY CLUSTERED 
(
	[tipo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Eventos]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Eventos](
	[idEventos] [varchar](50) NOT NULL,
	[fecha] [datetime] NULL,
	[hora] [varchar](50) NULL,
	[ubicacion] [varchar](300) NULL,
	[tema] [varchar](30) NULL,
	[descripcion] [varchar](300) NULL,
	[capacidad] [int] NULL,
	[imagen] [text] NULL,
	[Estado] [char](20) NULL,
	[fechaCreacion] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[idEventos] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[listaAsistencia]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[listaAsistencia](
	[idListaAsistencia] [int] IDENTITY(1,1) NOT NULL,
	[asistencia] [varchar](20) NULL,
	[estado] [char](1) NULL,
	[idAsistente] [varchar](30) NULL,
	[fecha] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[idListaAsistencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Ponentes]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Ponentes](
	[idPonente] [varchar](100) NOT NULL,
	[nombre] [varchar](50) NULL,
	[correo] [varchar](50) NULL,
	[telefono] [varchar](15) NULL,
	[gradoEstudios] [varchar](15) NULL,
	[tema] [varchar](200) NULL,
	[descripcion] [varchar](300) NULL,
	[horaInicio] [varchar](20) NULL,
	[horaFin] [varchar](20) NULL,
	[estado] [tinyint] NULL,
	[idEventos] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[idPonente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 8/24/2020 3:32:17 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[idUsusario] [varchar](50) NOT NULL,
	[nombre] [varchar](50) NULL,
	[correo] [varchar](50) NULL,
	[contrasenia] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[idUsusario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Asistentes] ADD  DEFAULT ('1') FOR [Estado]
GO
ALTER TABLE [dbo].[Eventos] ADD  DEFAULT ('1') FOR [Estado]
GO
ALTER TABLE [dbo].[listaAsistencia] ADD  CONSTRAINT [DF_listaAsistencia_estado]  DEFAULT ((0)) FOR [estado]
GO
ALTER TABLE [dbo].[Ponentes] ADD  DEFAULT ('1') FOR [estado]
GO
ALTER TABLE [dbo].[Asistentes]  WITH CHECK ADD  CONSTRAINT [FK_2] FOREIGN KEY([idEventos])
REFERENCES [dbo].[Eventos] ([idEventos])
GO
ALTER TABLE [dbo].[Asistentes] CHECK CONSTRAINT [FK_2]
GO
ALTER TABLE [dbo].[costo]  WITH CHECK ADD  CONSTRAINT [FK_3] FOREIGN KEY([idEventos])
REFERENCES [dbo].[Eventos] ([idEventos])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[costo] CHECK CONSTRAINT [FK_3]
GO
ALTER TABLE [dbo].[Eventos]  WITH CHECK ADD  CONSTRAINT [FK_Eventos_Eventos] FOREIGN KEY([idEventos])
REFERENCES [dbo].[Eventos] ([idEventos])
GO
ALTER TABLE [dbo].[Eventos] CHECK CONSTRAINT [FK_Eventos_Eventos]
GO
ALTER TABLE [dbo].[Eventos]  WITH CHECK ADD  CONSTRAINT [FK_Eventos_Eventos1] FOREIGN KEY([idEventos])
REFERENCES [dbo].[Eventos] ([idEventos])
GO
ALTER TABLE [dbo].[Eventos] CHECK CONSTRAINT [FK_Eventos_Eventos1]
GO
ALTER TABLE [dbo].[listaAsistencia]  WITH CHECK ADD  CONSTRAINT [f4] FOREIGN KEY([idAsistente])
REFERENCES [dbo].[Asistentes] ([idAsistente])
GO
ALTER TABLE [dbo].[listaAsistencia] CHECK CONSTRAINT [f4]
GO
ALTER TABLE [dbo].[Ponentes]  WITH CHECK ADD  CONSTRAINT [FK_1] FOREIGN KEY([idEventos])
REFERENCES [dbo].[Eventos] ([idEventos])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Ponentes] CHECK CONSTRAINT [FK_1]
GO
USE [master]
GO
ALTER DATABASE [EventosPrueba] SET  READ_WRITE 
GO
