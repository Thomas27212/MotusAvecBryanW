import csv
import unicodedata
import sys

def remove_accents(text):
    """Remplace les caractères accentués par leur équivalent sans accent."""
    # NFD décompose "é" en "e" + accent, puis on garde les caractères non-combining
    return ''.join(
        c for c in unicodedata.normalize('NFD', text)
        if unicodedata.category(c) != 'Mn'
    )

def process_csv(input_path, output_path):
    with open(input_path, newline='', encoding='utf-8') as infile, \
         open(output_path, 'w', newline='', encoding='utf-8') as outfile:

        reader = csv.reader(infile)
        writer = csv.writer(outfile)

        for row in reader:
            for cell in row:
                # Enlève les guillemets (au cas où csv ne les gère pas)
                word = cell.strip().strip('"').strip("'")

                # Ignore les espaces et les points
                if ' ' in word or '.' in word:
                    continue

                # Enlève les accents
                word_clean = remove_accents(word)

                # Garde uniquement les mots de 5 lettres (alphabétiques)
                if len(word_clean) == 5 and word_clean.isalpha():
                    writer.writerow([word_clean])

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python script.py <input.csv> <output.csv>")
        sys.exit(1)

    process_csv(sys.argv[1], sys.argv[2])
    print("Terminé !")
