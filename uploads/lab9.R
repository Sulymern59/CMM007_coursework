a <- "CMM020"
a
class(a)


a <- 1234.56
a
class(a)
b <- as.character(a)
b
class(b)

c <- "CMM020 Data Visualisation and analysis"
school <- substring(c, 1,2)
level <- substring(c,3,3)
number <- substring(c, 4,6)
title <- substring(c,7)


# pasting strings together

a <- "CMM020"
b <- "Data visualisation and analysis"

c <- paste(a,b)  # default separator is one blank space
c

d <- paste(a,b, sep="")   # no blank space
d

d <- paste(a,b, sep=": ")   # colon and blank space as separator
d


# concatenation
module <- paste("This module's school code is", school, "with level code",level)
module


# substitution
d <- sub("Data", "information", c)
d

# Numeric values
a <- 1234.56
a
class(a)
is.numeric(a)

b <- "this is not numeric"
is.numeric(b)
e <- "1234.56"
is.numeric(e)
g <- as.numeric(e)
is.numeric(g)

# |Integer


a <- 1234
class(a)
b <- as.integer(1234)
class(b)

c <- 1234.56
c
d <- as.integer(c)
d


is.integer(a)
is.integer(b)
is.integer(c)
is.integer(d)

# Logical (boolean)
a <- 1234.56
b <- is.integer(a)
b
class(b)

isTRUE(b)

# Using logical operators
a <- 20
b <- 40
c <- 50

(a > b)
(a < b) & (b < c)
(a > b) | (c > b)
xor((a < b) , (b < c))
xor((a < b) , (b > c))


# Vectors
firstname<- c("John", "Mary", "Tracy", "Duncan", "Omar","Sania")
matric <-c( 122345, 023451,072737,092959,075777, 099969)


# Aggregating vectors

 firstname1 <- c("John", "Mary", "Tracy", "Duncan", "Omar","Sania")
 firstname2 <- c("Adriana", "Lesley")
 firstname <- c(firstname1,firstname2)
 firstname
 
 # Retrieving individual components, or a group of components
 firstname[3]
 firstname[3:7]
 
 # invalid index
 firstname[3:9]
 
 # non-consecutive components
 firstname[c(2,4,6)]
 
 # or equivalently
 indexes <-c(FALSE,TRUE,FALSE,TRUE,FALSE,TRUE,FALSE,FALSE)
 firstname[indexes]
 
 # coercion when vectors are put together numeric changed to character string
 firstname<- c("John", "Mary", "Tracy", "Duncan", "Omar","Sania")
 matric <- c( 122345, 023451,072737,092959,075777, 099969)
 student <- c(firstname, matric)
 student
 
 # excluding vector members
 firstname<- c("John", "Mary", "Tracy", "Duncan", "Omar","Sania")
 firstname[-3]
 
 # updating a vector member
 firstname[6] <- "Sannyann"
 firstname
 
 # checking number of components in a vector
 length(firstname)
 
 # naming components of vectors
 modules <- c("CMM020", "Data Vis", "CMM007", "SW Project Eng")
 names(modules) <-c("Module1Num", "Module1Name", "Module2Num", "Module2Name")
 modules["Module2Num"]
 
 length(firstname)
modules <- c("CMM020", "Data Vis", "CMM007", "SW Project Eng")
names(modules) <-c("Module1Num", "Module1Name", "Module2Num", "Module2Name")
modules["Module2Num"]
modules[c("Module1Num", "Module2Num")]
   
 # accessing named components
modules[c("Module1Num", "Module2Num")]


# Matrix

vals1 <-c(200,30,24,3000,550,500,600,22,77,430,23,10)
m <- matrix( vals1, nrow=4,ncol=3,byrow=T)
m


# accessing element at row 4 column 2
m[4,2]

# Accessing row 3
m[3,]

# transposing rows and columns
mtransposed <- t(m) 
mtransposed

# Combining matrices
vals1 <-c(200,30,24,3000,550,500,600,22,77,430,23,10)
m <- matrix( vals1, nrow=4,ncol=3,byrow=T)
m
vals2 <-c(2,3,4,5,6,7,8,9)
n <- matrix(vals2, nrow=4,byrow=T)
n
o <- cbind(m,n)   # o combines the columns of  m and n
o


# adding rows instead of columns

vals1 <-c(200,30,24,3000,550,500,600,22,77,430,23,10)
m <- matrix( vals1, nrow=4,ncol=3,byrow=T)
m
vals2 <-c(2,3,4,5,6,7)
n <- matrix(vals2, ncol=3,byrow=T)
n
o <- rbind(m,n)   # o combines the rows of m and n
o

# to obtain all the elements in a matrix
vals <- c(o)
vals


# Lists

modules <- c("CMM020","CMM007")
students <-c("John", "Mary", "Tracy", "Duncan", "Omar","Sania")
rooms <- c(1,2,3,4,5,6,7,8)
info <-list(modules, students, rooms,01224262700)
info 

# Retrieving the second component of list info
info[[2]] ## this is a vector of character values

#Obtaining a list with the  second component of list 

info[2] ## this is a list

# Retrieving the  the 4th value of the second component in list info

info[[2]][4] # get the second component, then find its 4th value


# Naming list components

modules <- c("CMM020","CMM007")
students <-c("John", "Mary", "Tracy", "Duncan", "Omar","Sania")
rooms <- c(1,2,3,4,5,6,7,8)
info <-list(modulenames=modules, studentnames = students, rooomnumbers=rooms,tel=01224262700)
info
# Accessing the elements in the list using their name

info["modulenames"]

# equivalent to

info$modulenames

# Compare the above with

info[["modulenames"]]

# attaching lists

attach(info) 
modulenames 

# Detaching after use (this is important!)
detach(info)


# Data frames

module <- paste("module school code is", school, "with level code",level)
firstname<- c("louise", "John", "Mary", "Tracy", "Duncan", "Omar","Sania")
matric <-c( 222222,122345, 023451,072737,092959,075777, 099969)
course <- c("ITOG", "ITBI", "ITCY", "DS" ,"ITOG", "ITCY", "ITOG") 
start <- c("Jan18","Sep 17","Jan 18","Sep 17","Sep 17","Jan 18","Sep 17")
students <- data.frame(firstname, matric, course, start)
students


# Retrieving information about the 3rd student (3rd row)

students[3,]  # data frame of 1 row

# Retrieving  several rows using  a vector of indexes. 
students[c(3,5,6),]

# Retrieving   the 2nd column values
students[,2] # vector of numeric values

# Equivalent to
students$matric # vector

# Also equivalent to
students[[2]]  # vector

# Compare the above to 
Students[2]  # data frame

# Which is the same as
students["matric"] # data frame

# Retrieving  the element at 3rd row, second column
students[3,2]

# Finding out the number of rows in your data frame 
nrow(students)

# Finding out the number of columns 
ncol(students)

# Adding a new column  by creating a vector of values and assigning it to the new column name
birthdate <- c("06-11-1990", "02-04-2000","14-06-1993","29-01-1989","01-01-1991", "16-10-1976","20-12-1999")
students$birth <-birthdate
students

# Deleting the birth column
students[5] <- NULL  # delete column birth
students


# An equivalent method to add the column 
birthdate <- c("06-11-1990", "02-04-2000","14-06-1993","29-01-1989","01-01-1991", "16-10-1976","20-12-1999")
students[5] <-birthdate  # assign the values of birthdate to the 5th column
colnames(students)[5] <- "birth"   # rename the new column
students

# Creating  a new column containing just the year
students$year <- substring(students$birth,7,11)
students

# Adding a new column containing outstanding fees for each student
students$outstanding <- c(1200, 0,3200,500,0,0,100)


# Checking outstanding fees by course. 
# Create  a dataframe with mean values
  meanOutstanding <-aggregate(students$outstanding, 
                              by=list(students$course),  
                              FUN=mean, na.rm=TRUE)
# and getting outstanding fees
colnames(meanOutstanding) <- c("course","meanFeeDue")
View(meanOutstanding)

# Similar process but taking into account course and start time
meanOutstanding <-aggregate(students$outstanding, 
                            by=list(students$course, student$start),  
                            FUN=mean, na.rm=TRUE)
colnames(meanOutstanding) <- c("course","start","meanFeeDue")
View(meanOutstanding)

# Transposing data frames

# obtain mean and sum values - note that there are no subgroups 
#no start considered, only course)

meanOutstanding <-aggregate(students$outstanding, 
                            by=list(students$course),  
                            FUN=mean, na.rm=TRUE)
colnames(meanOutstanding) <- c("course", "meanFeeDue")
View(meanOutstanding)

sumOutstanding <-aggregate(students$outstanding, 
                           by=list(students$course),  
                           FUN=sum, na.rm=TRUE)
colnames(sumOutstanding) <- c("course", "sumFeeDue")
View(meanOutstanding)

# Put together into a data frame

statsOutstanding <- data.frame(meanOutstanding$course, meanOutstanding$meanFeeDue, sumOutstanding$sumFeeDue)
colnames(statsOutstanding) <- c("course","mean", "sum")

View(statsOutstanding)

# Transposing 

tstatsOutstanding <- t(statsOutstanding)
View(tstatsOutstanding)

# Renaming the header
colnames(tstatsOutstanding) <- meanOutstanding$course
View(tstatsOutstanding)

T# Removing 1st row, which just contains the course names
tstatsOutstanding <- tstatsOutstanding[c(-1),]
View(tstatsOutstanding)

# Renaming  row names 
rownames(tstatsOutstanding) <- c("average", "aggregate")
View(tstatsOutstanding)



# Exercise 1

meanOutstanding <-aggregate(students$outstanding, 
                            by=list(students$course),  
                            FUN=mean, na.rm=TRUE)

medianOutstanding <-aggregate(students$outstanding, 
                           by=list(students$course),  
                           FUN=median, na.rm=TRUE)


diffStats <- meanOutstanding[2] - medianOutstanding[2]

statsOutstanding <- data.frame(meanOutstanding[1], meanOutstanding[2], medianOutstanding[2], diffStats[1])
colnames(statsOutstanding) <- c("course", "mean","median", "difference")

