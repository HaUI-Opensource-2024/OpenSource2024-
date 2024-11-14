package org.example.data;

import jakarta.persistence.*;
import lombok.*;
import lombok.experimental.FieldDefaults;

import java.util.List;
@Entity
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE)
public class DataEntity {
    @Id
            @GeneratedValue(strategy = GenerationType.IDENTITY)
    int id;
    private String title;
    private boolean isPro;
    private String description;
    private String prompt;
    @ElementCollection
    List<String> fields;
}
