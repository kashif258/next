interface SectionHeadingProps {
  eyebrow: string;
  title: string;
  description?: string;
  align?: "left" | "center";
}

export function SectionHeading({ eyebrow, title, description, align = "left" }: SectionHeadingProps) {
  return (
    <div className={align === "center" ? "mx-auto max-w-2xl text-center" : "max-w-2xl"}>
      <p className="eyebrow mb-4">{eyebrow}</p>
      <h2 className="text-3xl font-semibold tracking-[-0.03em] text-white sm:text-4xl">{title}</h2>
      {description ? <p className="mt-4 text-lg text-zinc-300">{description}</p> : null}
    </div>
  );
}
