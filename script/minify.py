
input_path = ""
output_path = ""

with open(input_path, "r") as fr:
    with open(output_path, "w+") as fw:
        for line in fr:
            for ch in line:
                if ch != "\n":
                    print(ch)
                    fw.write(ch)
        fw.close()
    fr.close()

