USE [cinema_sessions]
GO
/****** Object:  Table [dbo].[cinemas]    Script Date: 14/09/2021 2:06:23 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[cinemas](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](50) NOT NULL,
	[building_address] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[movie_sessions]    Script Date: 14/09/2021 2:06:23 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[movie_sessions](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[cinema_id] [int] NULL,
	[ticket_id] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[movies]    Script Date: 14/09/2021 2:06:23 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[movies](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](60) NULL,
	[short_description] [varchar](500) NULL,
	[poster_url] [varchar](100) NULL,
	[is_premiere_week] [bit] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[orders]    Script Date: 14/09/2021 2:06:23 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[orders](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NOT NULL,
	[movie_session_id] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tickets]    Script Date: 14/09/2021 2:06:23 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tickets](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[price] [float] NOT NULL,
	[session_date] [date] NOT NULL,
	[movie_id] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 14/09/2021 2:06:23 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[email] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[cinemas] ON 

INSERT [dbo].[cinemas] ([id], [title], [building_address]) VALUES (2, N'Planeta Kino', N'Sokilnyky, st. Stryjska, 30, King Cross Leopolis')
INSERT [dbo].[cinemas] ([id], [title], [building_address]) VALUES (3, N'Planeta Kino', N'Kyiv, 34B Stepana Bandera Avenue')
INSERT [dbo].[cinemas] ([id], [title], [building_address]) VALUES (4, N'Planeta Kino', N'Lviv, "Forum Lviv" shopping mall')
INSERT [dbo].[cinemas] ([id], [title], [building_address]) VALUES (5, N'Multiplex', N'Lviv, "Victoria Gardens"')
INSERT [dbo].[cinemas] ([id], [title], [building_address]) VALUES (6, N'Multiplex', N'Kyiv, Central Department Store')
INSERT [dbo].[cinemas] ([id], [title], [building_address]) VALUES (7, N'Multiplex', N'Odessa, "GAGARINN PLAZA" shopping mall')
SET IDENTITY_INSERT [dbo].[cinemas] OFF
GO
SET IDENTITY_INSERT [dbo].[movie_sessions] ON 

INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (1, 2, 5)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (2, 2, 6)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (3, 2, 8)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (4, 2, 11)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (5, 2, 12)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (6, 2, 14)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (7, 3, 5)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (8, 2, 6)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (9, 3, 5)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (10, 3, 6)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (11, 3, 8)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (12, 3, 9)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (13, 4, 5)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (14, 4, 6)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (15, 4, 7)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (16, 4, 8)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (17, 4, 9)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (18, 4, 10)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (19, 4, 11)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (20, 4, 12)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (21, 4, 13)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (22, 4, 14)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (23, 4, 15)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (24, 5, 12)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (25, 5, 13)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (26, 5, 14)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (27, 5, 15)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (28, 6, 8)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (29, 6, 9)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (30, 6, 10)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (31, 6, 11)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (32, 6, 12)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (33, 6, 15)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (34, 7, 5)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (35, 7, 6)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (36, 7, 7)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (37, 7, 8)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (38, 7, 9)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (39, 7, 10)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (40, 7, 11)
INSERT [dbo].[movie_sessions] ([id], [cinema_id], [ticket_id]) VALUES (41, 7, 12)
SET IDENTITY_INSERT [dbo].[movie_sessions] OFF
GO
SET IDENTITY_INSERT [dbo].[movies] ON 

INSERT [dbo].[movies] ([id], [title], [short_description], [poster_url], [is_premiere_week]) VALUES (1, N'Free guy', N'Bank teller discovers he is actually a background player in an open-world video game', N'https://www.denofgeek.com/wp-content/uploads/2021/08/Free-Guy.jpg?fit=1800%2C1012', 0)
INSERT [dbo].[movies] ([id], [title], [short_description], [poster_url], [is_premiere_week]) VALUES (3, N'The Suicide Squad', N'The government sends the most dangerous supervillains in the world to the remote island', N'https://entertainmentnerd.com/wp-content/uploads/2021/10/the-suicide-squad-cast-1269522-1280x0-1.jpg', 0)
INSERT [dbo].[movies] ([id], [title], [short_description], [poster_url], [is_premiere_week]) VALUES (4, N'Shang-Chi and the Legend of the Ten Rings', N'Martial-arts master confronts the past when he is drawn into Ten Rings organization', N'https://nerdist.com/wp-content/uploads/2021/04/Simu-liu-shang-chi.jpeg', 1)
INSERT [dbo].[movies] ([id], [title], [short_description], [poster_url], [is_premiere_week]) VALUES (5, N'Jungle Cruise', N'Dr. Lily Houghton enlists the aid of wisecracking skipper Frank Wolff to take her down the Amazon.', N'https://thedisinsider.com/wp-content/uploads/2021/07/3F06AD37-6C98-4353-8752-DC62426FA0FE.jpeg', 0)
INSERT [dbo].[movies] ([id], [title], [short_description], [poster_url], [is_premiere_week]) VALUES (6, N'Space Jam: A New Legacy', N'Superstar LeBron James and his young son, Dom, get trapped in digital space by a rogue AI.', N'https://www.thephuketnews.com/photo/listing/2021/1630726833_1-org.jpg', 0)
SET IDENTITY_INSERT [dbo].[movies] OFF
GO
SET IDENTITY_INSERT [dbo].[orders] ON 

INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (1, 1, 3)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (2, 2, 2)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (3, 3, 4)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (4, 4, 1)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (5, 5, 7)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (6, 6, 5)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (7, 7, 6)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (8, 8, 11)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (9, 9, 13)
INSERT [dbo].[orders] ([id], [user_id], [movie_session_id]) VALUES (10, 10, 9)
SET IDENTITY_INSERT [dbo].[orders] OFF
GO
SET IDENTITY_INSERT [dbo].[tickets] ON 

INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (5, 2.99, CAST(N'2021-09-10' AS Date), 1)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (6, 2.99, CAST(N'2021-09-10' AS Date), 1)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (7, 3.99, CAST(N'2021-09-10' AS Date), 1)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (8, 1.99, CAST(N'2021-09-10' AS Date), 3)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (9, 1.99, CAST(N'2021-09-10' AS Date), 3)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (10, 4, CAST(N'2021-09-10' AS Date), 4)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (11, 4, CAST(N'2021-09-10' AS Date), 4)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (12, 4.99, CAST(N'2021-09-10' AS Date), 4)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (13, 1.99, CAST(N'2021-09-10' AS Date), 5)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (14, 2.49, CAST(N'2021-09-10' AS Date), 5)
INSERT [dbo].[tickets] ([id], [price], [session_date], [movie_id]) VALUES (15, 1.99, CAST(N'2021-09-10' AS Date), 6)
SET IDENTITY_INSERT [dbo].[tickets] OFF
GO
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([id], [email]) VALUES (1, N'peterparker@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (2, N'iamgroot@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (3, N'brucewayne@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (4, N'kkent@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (5, N'barryallen@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (6, N'misterj@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (7, N'herleyqq@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (8, N'dent2@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (9, N'capsteverodgers@gmail.com')
INSERT [dbo].[users] ([id], [email]) VALUES (10, N'godloki@gmail.com')
SET IDENTITY_INSERT [dbo].[users] OFF
GO
ALTER TABLE [dbo].[movie_sessions]  WITH CHECK ADD  CONSTRAINT [fk_cinema_id] FOREIGN KEY([cinema_id])
REFERENCES [dbo].[cinemas] ([id])
GO
ALTER TABLE [dbo].[movie_sessions] CHECK CONSTRAINT [fk_cinema_id]
GO
ALTER TABLE [dbo].[movie_sessions]  WITH CHECK ADD  CONSTRAINT [fk_ticket_id] FOREIGN KEY([ticket_id])
REFERENCES [dbo].[tickets] ([id])
GO
ALTER TABLE [dbo].[movie_sessions] CHECK CONSTRAINT [fk_ticket_id]
GO
ALTER TABLE [dbo].[orders]  WITH CHECK ADD  CONSTRAINT [fk_movie_session_id] FOREIGN KEY([movie_session_id])
REFERENCES [dbo].[movie_sessions] ([id])
GO
ALTER TABLE [dbo].[orders] CHECK CONSTRAINT [fk_movie_session_id]
GO
ALTER TABLE [dbo].[orders]  WITH CHECK ADD  CONSTRAINT [fk_user_id] FOREIGN KEY([user_id])
REFERENCES [dbo].[users] ([id])
GO
ALTER TABLE [dbo].[orders] CHECK CONSTRAINT [fk_user_id]
GO
ALTER TABLE [dbo].[tickets]  WITH CHECK ADD  CONSTRAINT [fk_movie_id] FOREIGN KEY([movie_id])
REFERENCES [dbo].[movies] ([id])
GO
ALTER TABLE [dbo].[tickets] CHECK CONSTRAINT [fk_movie_id]
GO
