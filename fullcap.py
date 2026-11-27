import csv
import sys

def process_csv(input_path, output_path):
    with open(input_path, newline='', encoding='utf-8') as infile, \
         open(output_path, 'w', newline='', encoding='utf-8') as outfile:

        reader = csv.reader(infile)
        writer = csv.writer(outfile)

        for row in reader:
            for cell in row:
                word = cell.strip()
                if word:
                    writer.writerow([word.upper()])

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python script.py <input.csv> <output.csv>")
        sys.exit(1)

    process_csv(sys.argv[1], sys.argv[2])
    print("Terminé !")
