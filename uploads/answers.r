


## 1
## creating the list
shopping <- c(12,2,1,11,20,2,2,1)
names(shopping) <- c("apples", "buns","loaf", "carrots","cereal bars","peppers", "oranges", "lemon")
# displaying the pie chart using the terrain colour palette and a suitable title.
pie(shopping, col=terrain.colors(length(shopping)), main = "Shopping list - items needed")

## 2
## set x and y axis
p <- ggplot(ProvenOilReservesZerosT, aes(MTBarrels, Denmark))
## point geom - a square (22), with a dark blue line and a blue fill. The size of the square depends on the amount of proven oil reserves for Denkmark.
p <- p + geom_point(shape=22, colour="darkblue", fill= "blue", aes(size=factor(Denmark)))
## suitable labels, title and legend.
p <- p + labs( x="year", y= "proven oil reserves", title = "Proven Oil Reserves for Denmark (million ton barrels)", size="Million Ton Barrels") 
p

## 3
## x axis is n.
p <- ggplot(channels, aes(n))
## one line for electric. Its colour label is specified as "electric current"
p <- p+geom_line(aes(y = electric, colour = "electric current"))
## one line for length. Its colour label is specified as "object's length"
p <- p+geom_line(aes(y = length, colour = "object’s length"))
## one line for area. Its colour label is specified as "object's area"
p <- p+geom_line(aes(y = area, colour = "object’s area"))
## x and y labels plus legend for colours
p<-p+labs(x= "size of stimuli", y= "size of sensation", colour="Channels")
## limit y axis to 50 to appreciate differences between length and area
p <- p+ylim(0,50) 
p

##4
## Present "year" against amount (MT barrels), grouping the data according to the country.
p <- ggplot(ProvenOilReserveWEurope, aes(Year, MT.Barrels, group=Country))
## Use coloured line - a colour per country
p <- p + geom_line(aes(colour=factor(Country)))
## add appropriate labels, title and legend
p <- p+labs(x="year", y = "proven oil reserves", title="Proven oil reserves in West Europe (Million ton barrels)", colour="Country")
p
 


## 5
P <- ggplot(ProvenOilReserveWEurope, aes(Year))
## colour is coutry-dependent. The Y axis is MT.Barrels. the colour of the tiles is Country-dependent.
p <- p+geom_tile(aes(y = MT.Barrels, colour=Country, fill=Country))
## add appropriate labels, title and legend
p <- p+labs(x="year", y = "proven oil reserves", title="Proven oil reserves in West Europe (Million ton barrels)", colour="Country")
## Facet specification - present them vertically.
p <- p + facet_grid(Country ~ .)
p
