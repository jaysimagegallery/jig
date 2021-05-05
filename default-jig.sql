/*
title = the name of your gallery
subtitle = a sentence about your gallery
language = The language your want to use
numpage = The number of albums per page
picpage = The number of photos per page
hideinfo = Hide image information on photo page
comments = Enable the commenting system. yesmembers/yesanyone/no
commentorder = Oldest(Ascending) or newest(descending) comments first
recaptcha = Enable Google reCAPTCHA. yes/no
sitekey = Google reCAPTCHA site key
secretkey = Google reCAPTCHA secret key
watermark = Enable watermark. no/yestext/yesimage
wmposition = Watermark position
textwatermark = The text for the watermark
wmtextcolor = Text color for the watermark
imagewatermark = The image for the watermark
apdordre = Display album or photos first.
contactform = Display contact form
branding = Turn branding on/off
notifyanon = Email when an anonymous comment needs approval yes/no
fadeeffect = If the gallery fades in as it is being displayed. In seconds.
*/

CREATE TABLE general ( 
	title varchar(100) NOT NULL, 
	subtitle varchar(250) NOT NULL,
	language varchar (50) NOT NULL,
	numpage int (5) NOT NULL,
	picpage int (5) NOT NULL,
	hideinfo varchar (5) NOT NUll,
	comments varchar (10) NOT NULL,
	commentorder varchar (10) NOT NULL,
	recaptcha varchar (10) NOT NULL,
	sitekey varchar (50) NOT NULL,
	secretkey varchar (50) NOT NULL,
	watermark varchar (10) NOT NULL,
	wmposition varchar (25) NOT NUll,
	textwatermark varchar (100) NOT NULL,
	wmtextcolor varchar (10) NOT NULL,
	imagewatermark varchar (100)  NOT NULL,
	apdorder varchar (10) NOT NULL,
	contactform varchar (5) NOT NULL,
	branding varchar (5) NOT NULL,
	notifyanon varchar (5) NOT NULL,
	fadeeffect varchar (5) NOT NULL
);


INSERT INTO general (title, subtitle, language, numpage, picpage, hideinfo, comments, commentorder, recaptcha, sitekey, secretkey, watermark, wmposition, textwatermark, wmtextcolor, imagewatermark, apdorder, contactform, branding, notifyanon, fadeeffect) VALUES ('Jay\'s Image Gallery', 'A simple image gallery for your website', 'English', '9', '9', 'no', 'no', 'ASC', 'no', '', '', 'no', 'middle', '', 'grey', '', 'albums', 'no', 'off', 'no', '1.5');

/*
username = Members username
password = Members password
first = Members first name
last = Members last name
email = Members email address
photoname = name of file
photo = photo image file
mimetype = type of image
*/

CREATE TABLE members (
	username varchar (100) NOT NULL,
	password varchar (1000) NOT NULL,
	first varchar (100) NOT NULL,
	last varchar (100) NOT NULL,
	email varchar (250) NOT NULL,
	photoname varchar (1000) NOT NULL,
	photo longblob NOT NULL,
	mimetype varchar (25) NOT NULL,
	cookieid varchar (100) NOT NULL
);

INSERT INTO members (username, password, first, last, email, photoname, photo, mimetype, cookieid) VALUES ('Administrator', '', '', '', '', '', '', '', '');

/*
ipaddress = IP address of person attempting to log in
currenttime = The time, will limit to 5 login attempts in 1 hour
*/

CREATE TABLE loginattempts (
  user varchar (100) NOT NULL,
  ipaddress varchar (20) NOT NULL,
  currenttime timestamp NOT NULL
);

/*
key = Unique key sent to user
currenttime = The time, will limit reset email to expire after 10 minutes
email = The email address associated with the member
*/

CREATE TABLE forgotpassword (
	randomkey varchar (1000) NOT NULL,
	email varchar (250) NOT NULL,
	currenttime timestamp NOT NULL
);

/*
cid = Comment identification
username = If comment left by member
name = Given by anonymous user
comment = The comment
pin = photo the comment belongs too
live = The comment is live yes/no
photodir = Where the comment is located
*/

CREATE TABLE comments (
	cid int (10) NOT NULL auto_increment,
	username varchar (100) NOT NULL,
	name varchar (100) NOT NULL,
	comment varchar (10000) NOT NULL,
	pin int (10) NOT NULL,
	live varchar (3) NOT NULL,
	photodir varchar (6000) NOT NULL,
	commentdate timestamp NOT NULL,
	PRIMARY KEY (cid)  
);


/*
ain = album identification number
album = name of the album
pain = parent album identification number - This number is the same as 'ain' so we know what albums belong to which parent albums
parentalbum = the parent album of the current album. Specify 'None' for a root album
albumdir = Full path of album
displayorder = Album display order
status = Public or private
*/

CREATE TABLE albums ( 
	ain int (10) NOT NULL auto_increment,
	album varchar (100) NOT NULL, 
	pain int (10) NOT NULL,
	parentalbum varchar (100) NOT NULL,
	albumdir varchar (6000) NOT NULL,
	displayorder int (10) NOT NULL,
	status varchar (10) NOT NULL,
	PRIMARY KEY (ain)    
);

INSERT INTO albums (album, pain, parentalbum, albumdir, displayorder, status) VALUES ('None', '1', 'root', '/', '0', 'public');


/*
pin = photo identification number
name = photo name
ain = album to which the photo belongs...so its the albums ain
photodir = Where the photo is located
displayorder = Photo display order
status = Public or private
photodate = Date photo was taken
cameramake = Camera make
cameramodel = Camera model
colspace = Color space
Exif data
gpslat = Latitude
gpslatref = N or S
gpslon = Longitude
gpslonref = E or W
show* = To show the information or not, yes/no
*/

CREATE TABLE photos (
	pin int (10) NOT NULL auto_increment,
	name varchar (100) NOT NULL,
	ain int (10) NOT NULL,
	photodir varchar (6000) NOT NULL,
	displayorder int (10) NOT NULL,
	status varchar (20) NOT NULL,
	photodate varchar (30) NOT NULL,
	cameramake varchar (30) NOT NULL,
	cameramodel varchar (30) NOT NULL,
	orientation varchar (5) NOT NULL,
	iscolor varchar (20) NOT NULL,
	xres varchar (30) NOT NULL,
	yres varchar (30) NOT NULL,
	resolutionunit varchar (30) NOT NULL,
	focusdistance varchar (30) NOT NULL,
	focallength varchar (30) NOT NULL,
	software varchar (150) NOT NULL,
	apfnumber varchar (30) NOT NULL,
	apvalue varchar (30) NOT NULL,
	shutterspeed varchar (30) NOT NULL,
	brightnessvalue varchar (50) NOT NULL,
	sharpness varchar (30) NOT NULL,
	colorspace varchar (30) NOT NULL,
	interoperabilityindex varchar (30) NOT NULL,
	interoperabilityversion varchar (30) NOT NULL,
	scenecapturetype varchar (30) NOT NULL,
	exposuretime varchar (30) NOT NULL,
	flash varchar (30) NOT NULL,
	saturation varchar (30) NOT NULL,
	whitebalance varchar (30) NOT NULL,
	subjectdistance varchar (30) NOT NULL,
	isospeedratings varchar (30) NOT NUll,
	contrast varchar (30) NOT NULL,
	fl35mm varchar (30) NOT NULL,
	metering varchar (30) NOT NULL,
	exifver varchar (30) NOT NULL,
	subsectime varchar (10) NOT NULL,
	subsectimeoriginal varchar (10) NOT NULL,
	subsectimedigitized varchar (10) NOT NULL,
	flashpixversion varchar (10) NOT NULL,
	imageuniqueid varchar (40) NOT NULL,
	latdeg varchar (50) NOT NULL,
	latmin varchar (50) NOT NULL,
	latsec varchar (50) NOT NULL,
	gpslatref varchar (5) NOT NULL,
	latsign varchar (5) NOT NULL,
	londeg varchar (50) NOT NULL,
	lonmin varchar (50) NOT NULL,
	lonsec varchar (50) NOT NULL,
	gpslonref varchar (5) NOT NULL,
	lonsign varchar (5) NOT NULL,
	gpsaltitude varchar (50) NOT NULL,
	altref varchar (5) NOT NULL,
	componentsconfiguration varchar (30) NOT NULL,
	ycbcrpositioning varchar (30) NOT NULL,
	scenetype varchar (30) NOT NULL,
	exposurebiasvalue varchar (30) NOT NULL,
	exposuremode varchar (30) NOT NULL,
	lightsource varchar (30) NOT NULL,
	filesource varchar (30) NOT NULL,
	digitalzoomratio varchar (30) NOT NULL,
	customrendered varchar (30) NOT NULL,
	compressedbitsperpixel varchar (30) NOT NULL,
	maxaperturevalue varchar (30) NOT NULL,
	exposureprogram varchar (30) NOT NULL,
	description varchar (5000) NOT NULL,
	enablegps varchar (5) NOT NULL,
	showphotodate varchar (5) NOT NULL,
	showcameramake varchar (5) NOT NULL,
	showcameramodel varchar (5) NOT NULL,
	showxres varchar (5) NOT NULL,
	showyres varchar (5) NOT NULL,
	showresolutionunit varchar (5) NOT NULL,
	showfocusdistance varchar (5) NOT NULL,
	showfocallength varchar (5) NOT NULL,
	showsoftware varchar (5) NOT NULL,
	showaperturefnumber varchar (5) NOT NULL,
	showaperturevalue varchar (5) NOT NULL,
	showshutterspeed varchar (5) NOT NULL,
	showbrightnessvalue varchar (5) NOT NULL,
	showsharpness varchar (5) NOT NULL,
	showcolorspace varchar (5) NOT NULL,
	showscenecapturetype varchar (5) NOT NULL,
	showexposuretime varchar (5) NOT NULL,
	showflash varchar (5) NOT NULL,
	showsaturation varchar (5) NOT NULL,
	showwhitebalance varchar (5) NOT NULL,
	showinteroperabilityindex varchar (5) NOT NULL,
	showinteroperabilityversion varchar (5) NOT NULL,
	showsubjectdistance varchar (5) NOT NULL,
	showisospeedratings varchar (5) NOT NULL,
	showcontrast varchar (5) NOT NULL,
    showfl35mm varchar (5) NOT NULL,
	showmetering varchar (5) NOT NULL,
	showexifver varchar (5) NOT NULL,
	showorientation varchar (5) NOT NULL,
	showiscolor varchar (5) NOT NULL,
	showsubsectime varchar (5) NOT NULL,
	showsubsectimeoriginal varchar (5) NOT NULL,
	showsubsectimedigitized varchar (5) NOT NULL,
	showflashpixversion varchar (5) NOT NULL,
	showimageuniqueid varchar (5) NOT NULL,
	showgpsaltitude varchar (5) NOT NULL,
	showname varchar (5) NOT NULL,
	showmimetype varchar (5) NOT NULL,
	showdimensions varchar (5) NOT NULL,
	showsize varchar (5) NOT NULL,
	showcomponentsconfiguration varchar (5) NOT NULL,
	showycbcrpositioning varchar (5) NOT NULL,
	showscenetype varchar (5) NOT NULL,
	showexposurebiasvalue varchar (5) NOT NULL,
	showexposuremode varchar (5) NOT NULL,
	showlightsource varchar (5) NOT NULL,
	showfilesource varchar (5) NOT NULL,
	showdigitalzoomratio varchar (5) NOT NULL,
	showcustomrendered varchar (5) NOT NULL,
	showcompressedbitsperpixel varchar (5) NOT NULL,
	showmaxaperturevalue varchar (5) NOT NULL,
	showexposureprogram varchar (5) NOT NULL,
	PRIMARY KEY (pin)
);
/*
name = Name of the theme
item = Different parts of the theme
defaults = The default color scheme
current = the current color scheme, changaeble by the user
inuse = if the theme is currently being used. yes/no

There are 5 themes out of the box. Default, Aubergine, Greyscale, Pumpkin and Valentines
*/

CREATE TABLE theme (
	name varchar (50) NOT NULL,
	item varchar(25) NOT NULL,
	defaults varchar(25) NOT NULL,
	current varchar(25) NOT NULL,
	inuse varchar(5) NOT NULL
);

INSERT INTO `theme` (`name`, `item`, `defaults`, `current`, `inuse`) VALUES
('Default', 'FontFamily', 'Open Sans', 'Open Sans', 'yes'),
('Default', 'FontColor', '333333', '333333', 'yes'),
('Default', 'OuterBackgroundColor', '1D6FA5', '1D6FA5', 'yes'),
('Default', 'InnerBackgroundColor', 'FFFFFF', 'FFFFFF', 'yes'),
('Default', 'SelectedTab', '99A3A9', '99A3A9', 'yes'),
('Default', 'SelectedTabFontColor', 'FFFFFF', 'FFFFFF', 'yes'),
('Default', 'UnselectedTab', 'DEE2E3', 'DEE2E3', 'yes'),
('Default', 'UnselectedTabFontColor', '333333', '333333', 'yes'),
('Default', 'Buttons', '199049', '199049', 'yes'),
('Default', 'ButtonTextColor', 'FFFFFF', 'FFFFFF', 'yes'),
('Default', 'InnerAlbumBorder', 'E1E1E1', 'E1E1E1', 'yes'),
('Default', 'AlbumBackgroundColor', 'FAFAFA', 'FAFAFA', 'yes'),
('Default', 'AlbumFontColor', '279A1B', '279A1B', 'yes'),
('Default', 'BreadcrumbFontColor', '333333', '333333', 'yes'),
('Default', 'Breadcrumb', 'DEE2E3', 'DEE2E3', 'yes'),
('Default', 'Divider', 'DEE2E3', 'DEE2E3', 'yes'),
('Default', 'TextboxBorder', 'DEE2E3', 'DEE2E3', 'yes'),
('Default', 'TextboxBackground', 'FFFFFF', 'FFFFFF', 'yes'),
('Default', 'Borders', '99A3A9', '99A3A9', 'yes'),
('Default', 'FailedLoginTextColor', 'BE2026', 'BE2026', 'yes'),
('Default', 'NextPrevDisabledText', '99A3A9', '99A3A9', 'yes'),
('Default', 'NextPrevBackground', 'FAFAFA', 'FAFAFA', 'yes'),
('Default', 'DefaultLinkColor', '22558C', '22558C', 'yes'),
('Default', 'VisitedLinkColor', '551A8B', '551A8B', 'yes'),
('Default', 'SuccessFailureBackground', 'DCF6F7', 'DCF6F7', 'yes'),
('Default', 'SuccessFailureBorder', '31C6CA', '31C6CA', 'yes'),
('Valentines', 'FontFamily', 'Delius', 'Delius', 'no'),
('Valentines', 'FontColor', '69152C', '69152C', 'no'),
('Valentines', 'OuterBackgroundColor', '9A1F40', '9A1F40', 'no'),
('Valentines', 'InnerBackgroundColor', 'FDF6F8', 'FDF6F8', 'no'),
('Valentines', 'SelectedTab', 'DC5277', 'DC5277', 'no'),
('Valentines', 'SelectedTabFontColor', 'FFFFFF', 'FFFFFF', 'no'),
('Valentines', 'UnselectedTab', 'F3C5D1', 'F3C5D1', 'no'),
('Valentines', 'UnselectedTabFontColor', '480F1E', '480F1E', 'no'),
('Valentines', 'Buttons', 'DC5277', 'DC5277', 'no'),
('Valentines', 'ButtonTextColor', 'FFFFFF', 'FFFFFF', 'no'),
('Valentines', 'InnerAlbumBorder', 'F0B4C4', 'F0B4C4', 'no'),
('Valentines', 'AlbumBackgroundColor', 'FAE5EB', 'FAE5EB', 'no'),
('Valentines', 'AlbumFontColor', '9A1F40', '9A1F40', 'no'),
('Valentines', 'BreadcrumbFontColor', '69152C', '69152C', 'no'),
('Valentines', 'Breadcrumb', 'F3C5D1', 'F3C5D1', 'no'),
('Valentines', 'Divider', '9A1F40', '9A1F40', 'no'),
('Valentines', 'TextboxBorder', 'E994AB', 'E994AB', 'no'),
('Valentines', 'TextboxBackground', 'FFFFFF', 'FFFFFF', 'no'),
('Valentines', 'Borders', 'DC5277', 'DC5277', 'no'),
('Valentines', 'FailedLoginTextColor', 'BE2026', 'BE2026', 'no'),
('Valentines', 'NextPrevDisabledText', 'E994AB', 'E994AB', 'no'),
('Valentines', 'NextPrevBackground', 'FAE5EB', 'FAE5EB', 'no'),
('Valentines', 'DefaultLinkColor', '9A1F40', '9A1F40', 'no'),
('Valentines', 'VisitedLinkColor', '9A1F40', '9A1F40', 'no'),
('Valentines', 'SuccessFailureBackground', 'F3C5D1', 'F3C5D1', 'no'),
('Valentines', 'SuccessFailureBorder', 'E994AB', 'E994AB', 'no'),
('Greyscale', 'FontFamily', 'Righteous', 'Righteous', 'no'),
('Greyscale', 'FontColor', '171E22', '171E22', 'no'),
('Greyscale', 'OuterBackgroundColor', '1F1F24', '1F1F24', 'no'),
('Greyscale', 'InnerBackgroundColor', 'FEFEFE', 'FEFEFE', 'no'),
('Greyscale', 'SelectedTab', '678496', '678496', 'no'),
('Greyscale', 'SelectedTabFontColor', 'FFFFFF', 'FFFFFF', 'no'),
('Greyscale', 'UnselectedTab', 'C4CFD6', 'C4CFD6', 'no'),
('Greyscale', 'UnselectedTabFontColor', '171E22', '171E22', 'no'),
('Greyscale', 'Buttons', '678496', '678496', 'no'),
('Greyscale', 'ButtonTextColor', 'FFFFFF', 'FFFFFF', 'no'),
('Greyscale', 'InnerAlbumBorder', 'DBE2E6', 'DBE2E6', 'no'),
('Greyscale', 'AlbumBackgroundColor', 'F2F5F6', 'F2F5F6', 'no'),
('Greyscale', 'AlbumFontColor', '4F6573', '4F6573', 'no'),
('Greyscale', 'BreadcrumbFontColor', '171E22', '171E22', 'no'),
('Greyscale', 'Breadcrumb', 'E6EBEE', 'E6EBEE', 'no'),
('Greyscale', 'Divider', 'C4CFD6', 'C4CFD6', 'no'),
('Greyscale', 'TextboxBorder', 'C4CFD6', 'C4CFD6', 'no'),
('Greyscale', 'TextboxBackground', 'FFFFFF', 'FFFFFF', 'no'),
('Greyscale', 'Borders', '678496', '678496', 'no'),
('Greyscale', 'FailedLoginTextColor', 'BE2026', 'BE2026', 'no'),
('Greyscale', 'NextPrevDisabledText', '99A3A9', '99A3A9', 'no'),
('Greyscale', 'NextPrevBackground', 'E6EBEE', 'E6EBEE', 'no'),
('Greyscale', 'DefaultLinkColor', '373640', '373640', 'no'),
('Greyscale', 'VisitedLinkColor', '373640', '373640', 'no'),
('Greyscale', 'SuccessFailureBackground', 'E6EBEE', 'E6EBEE', 'no'),
('Greyscale', 'SuccessFailureBorder', 'C4CFD6', 'C4CFD6', 'no'),
('Aubergine', 'FontFamily', 'Ubuntu', 'Ubuntu', 'no'),
('Aubergine', 'FontColor', '411934', '411934', 'no'),
('Aubergine', 'OuterBackgroundColor', '772953', '772953', 'no'),
('Aubergine', 'InnerBackgroundColor', 'F1E9ED', 'F1E9ED', 'no'),
('Aubergine', 'SelectedTab', '772953', '772953', 'no'),
('Aubergine', 'SelectedTabFontColor', 'FFFFFF', 'FFFFFF', 'no'),
('Aubergine', 'UnselectedTab', 'CFB4C2', 'CFB4C2', 'no'),
('Aubergine', 'UnselectedTabFontColor', '333333', '333333', 'no'),
('Aubergine', 'Buttons', 'E95420', 'E95420', 'no'),
('Aubergine', 'ButtonTextColor', 'FFFFFF', 'FFFFFF', 'no'),
('Aubergine', 'InnerAlbumBorder', 'BB94A9', 'BB94A9', 'no'),
('Aubergine', 'AlbumBackgroundColor', 'EADEE5', 'EADEE5', 'no'),
('Aubergine', 'AlbumFontColor', '772953', '772953', 'no'),
('Aubergine', 'BreadcrumbFontColor', '333333', '333333', 'no'),
('Aubergine', 'Breadcrumb', 'D4CCD2', 'D4CCD2', 'no'),
('Aubergine', 'Divider', '772953', '772953', 'no'),
('Aubergine', 'TextboxBorder', 'CFB4C2', 'CFB4C2', 'no'),
('Aubergine', 'TextboxBackground', 'FFFFFF', 'FFFFFF', 'no'),
('Aubergine', 'Borders', '772953', '772953', 'no'),
('Aubergine', 'FailedLoginTextColor', 'BE2026', 'BE2026', 'no'),
('Aubergine', 'NextPrevDisabledText', 'BB94A9', 'BB94A9', 'no'),
('Aubergine', 'NextPrevBackground', 'E3D4DC', 'E3D4DC', 'no'),
('Aubergine', 'DefaultLinkColor', '772953', '772953', 'no'),
('Aubergine', 'VisitedLinkColor', '772953', '772953', 'no'),
('Aubergine', 'SuccessFailureBackground', 'D4CCD2', 'D4CCD2', 'no'),
('Aubergine', 'SuccessFailureBorder', '2C001E', '2C001E', 'no'),
('Pumpkin', 'FontFamily', 'Joti One', 'Joti One', 'no'),
('Pumpkin', 'FontColor', '333333', '333333', 'no'),
('Pumpkin', 'OuterBackgroundColor', '000000', '000000', 'no'),
('Pumpkin', 'InnerBackgroundColor', 'FFF6F0', 'FFF6F0', 'no'),
('Pumpkin', 'SelectedTab', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'SelectedTabFontColor', 'FFFFFF', 'FFFFFF', 'no'),
('Pumpkin', 'UnselectedTab', 'FFC7A1', 'FFC7A1', 'no'),
('Pumpkin', 'UnselectedTabFontColor', '333333', '333333', 'no'),
('Pumpkin', 'Buttons', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'ButtonTextColor', 'FFFFFF', 'FFFFFF', 'no'),
('Pumpkin', 'InnerAlbumBorder', 'FFC7A1', 'FFC7A1', 'no'),
('Pumpkin', 'AlbumBackgroundColor', 'FFEADC', 'FFEADC', 'no'),
('Pumpkin', 'AlbumFontColor', '333333', '333333', 'no'),
('Pumpkin', 'BreadcrumbFontColor', 'FFFFFF', 'FFFFFF', 'no'),
('Pumpkin', 'Breadcrumb', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'Divider', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'TextboxBorder', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'TextboxBackground', 'FFFFFF', 'FFFFFF', 'no'),
('Pumpkin', 'Borders', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'FailedLoginTextColor', 'FF6600', 'FF6600', 'no'),
('Pumpkin', 'NextPrevDisabledText', 'C6AAA2', 'C6AAA2', 'no'),
('Pumpkin', 'NextPrevBackground', 'FFEADC', 'FFEADC', 'no'),
('Pumpkin', 'DefaultLinkColor', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'VisitedLinkColor', 'FF6904', 'FF6904', 'no'),
('Pumpkin', 'SuccessFailureBackground', 'FFEADC', 'FFEADC', 'no'),
('Pumpkin', 'SuccessFailureBorder', 'FF6904', 'FF6904', 'no'),
('DarkMode', 'FontFamily', 'Secular One', 'Secular One', 'no'),
('DarkMode', 'FontColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'OuterBackgroundColor', '17223B', '17223B', 'no'),
('DarkMode', 'InnerBackgroundColor', '6B778D', '6B778D', 'no'),
('DarkMode', 'SelectedTab', '263859', '263859', 'no'),
('DarkMode', 'SelectedTabFontColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'UnselectedTab', '324974', '324974', 'no'),
('DarkMode', 'UnselectedTabFontColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'Buttons', '263859', '263859', 'no'),
('DarkMode', 'ButtonTextColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'InnerAlbumBorder', '383F4A', '383F4A', 'no'),
('DarkMode', 'AlbumBackgroundColor', '758196', '758196', 'no'),
('DarkMode', 'AlbumFontColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'BreadcrumbFontColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'Breadcrumb', '17223B', '17223B', 'no'),
('DarkMode', 'Divider', '17223B', '17223B', 'no'),
('DarkMode', 'TextboxBorder', '383F4A', '383F4A', 'no'),
('DarkMode', 'TextboxBackground', 'C3C8D2', 'C3C8D2', 'no'),
('DarkMode', 'Borders', '17223B', '17223B', 'no'),
('DarkMode', 'FailedLoginTextColor', 'FF3435', 'FF3435', 'no'),
('DarkMode', 'NextPrevDisabledText', 'C9D3EA', 'C9D3EA', 'no'),
('DarkMode', 'NextPrevBackground', '808B9F', '808B9F', 'no'),
('DarkMode', 'DefaultLinkColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'VisitedLinkColor', 'EBEBEB', 'EBEBEB', 'no'),
('DarkMode', 'SuccessFailureBackground', '263859', '263859', 'no'),
('DarkMode', 'SuccessFailureBorder', '17223B', '17223B', 'no');
