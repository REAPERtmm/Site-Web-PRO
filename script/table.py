
start = """CREATE TABLE Customs(
	IDCustom INT PRIMARY KEY AUTO_INCREMENT,
    IDUser INT,
    IDProduit INT,
    BackplateColor VARCHAR(7) DEFAULT "#bbbbbb",
    KeycapColor VARCHAR(7) DEFAULT "#0000ff",
    Langue VARCHAR(255) DEFAULT "zqsd",
    Modifier VARCHAR(255) DEFAULT "ctrl",
    OS VARCHAR(255) DEFAULT "Windows",

"""

Foreign = """
	FOREIGN KEY (IDUser) REFERENCES Users(IDUser),
	FOREIGN KEY (IDProduit) REFERENCES Produit(IDProduit),
"""


def addforeign(name):
    global start, Foreign
    start += "\t" + name + " INT DEFAULT 1,\n"
    Foreign +=  "\t"+"FOREIGN KEY (" + name + ") REFERENCES Keyss(IDKey),\n"


for i in range(61):
    addforeign("IDKey" + str(i))

print(start + Foreign + ")")